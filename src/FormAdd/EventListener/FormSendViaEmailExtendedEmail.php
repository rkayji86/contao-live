<?php

namespace FormAdd\EventListener;

use Contao\Email;
use Contao\CoreBundle\Monolog\ContaoContext;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email as EmailMessage;

class FormSendViaEmailExtendedEmail extends Email
{
	protected $senderAddress;


	public function __set($strKey, $varValue)
	{
		if ('senderAddress' === $strKey) {
			$this->senderAddress = $varValue;
		} else {
			return parent::__set($strKey, $varValue);
		}
	}

	public function __get($strKey)
	{
		if ('senderAddress' === $strKey) {
			return $this->senderAddress;
		} else {
			return parent::__get($strKey);
		}
	}

	public function sendTo()
	{
		$arrRecipients = $this->compileRecipients(\func_get_args());

		if (empty($arrRecipients)) {
			return false;
		}

		if ($this->objMessage instanceof EmailMessage) {
			$this->objMessage->to(...$arrRecipients);
		} else {
			$this->objMessage->setTo($arrRecipients);
			$this->objMessage->setCharset($this->strCharset);
		}

		// Add the priority if it has been set (see #608)
		if ($this->intPriority !== null) {
			if ($this->objMessage instanceof EmailMessage) {
				$this->objMessage->priority($this->intPriority);
			} else {
				$this->objMessage->setPriority($this->intPriority);
			}
		}

		// Default subject
		if (!$this->strSubject) {
			$this->strSubject = 'No subject';
		}

		if ($this->objMessage instanceof EmailMessage) {
			$this->objMessage->subject($this->strSubject);
		} else {
			$this->objMessage->setSubject($this->strSubject);
		}

		// HTML e-mail
		if ($this->strHtml) {
			// Embed images
			if ($this->blnEmbedImages) {
				if (!$this->strImageDir) {
					$this->strImageDir = System::getContainer()->getParameter('kernel.project_dir') . '/';
				}

				$arrCid = array();
				$arrMatches = array();
				$strBase = Environment::get('base');

				// Thanks to @ofriedrich and @aschempp (see #4562)
				preg_match_all('/<[a-z][a-z0-9]*\b[^>]*((src=|background=|url\()["\']??)(.+\.(jpe?g|png|gif|bmp|tiff?|swf))(["\' ]??(\)??))[^>]*>/Ui', $this->strHtml, $arrMatches);

				// Check for internal images
				if (!empty($arrMatches) && isset($arrMatches[0])) {
					for ($i = 0, $c = \count($arrMatches[0]); $i < $c; $i++) {
						$url = $arrMatches[3][$i];

						// Try to remove the base URL
						$src = str_replace($strBase, '', $url);
						$src = rawurldecode($src); // see #3713

						// Embed the image if the URL is now relative
						if (!preg_match('@^https?://@', $src) && ($objFile = new File(StringUtil::stripRootDir($this->strImageDir . $src))) && ($objFile->exists() || $objFile->createIfDeferred())) {
							if (!isset($arrCid[$src])) {
								if ($this->objMessage instanceof EmailMessage) {
									// See https://symfony.com/doc/current/mailer.html#embedding-images
									$this->objMessage->embedFromPath($this->strImageDir . $src, $src);
									$arrCid[$src] = 'cid:' . $src;
								} else {
									$arrCid[$src] = $this->objMessage->embed(\Swift_EmbeddedFile::fromPath($this->strImageDir . $src));
								}
							}

							$this->strHtml = str_replace($arrMatches[1][$i] . $arrMatches[3][$i] . $arrMatches[5][$i], $arrMatches[1][$i] . $arrCid[$src] . $arrMatches[5][$i], $this->strHtml);
						}
					}
				}
			}

			if ($this->objMessage instanceof EmailMessage) {
				$this->objMessage->html($this->strHtml, $this->strCharset);
			} else {
				$this->objMessage->setBody($this->strHtml, 'text/html');
			}
		}

		// Text content
		if ($this->strText) {
			if ($this->objMessage instanceof EmailMessage) {
				$this->objMessage->text($this->strText, $this->strCharset);
			} elseif ($this->strHtml) {
				$this->objMessage->addPart($this->strText, 'text/plain');
			} else {
				$this->objMessage->setBody($this->strText, 'text/plain');
			}
		}

		// Add the administrator e-mail as default sender
		if (!$this->strSender) {
			if (!empty($GLOBALS['TL_ADMIN_EMAIL'])) {
				$this->strSender = $GLOBALS['TL_ADMIN_EMAIL'];
				$this->strSenderName = $GLOBALS['TL_ADMIN_NAME'] ?? null;
			} elseif ($adminEmail = Config::get('adminEmail')) {
				list($this->strSenderName, $this->strSender) = StringUtil::splitFriendlyEmail($adminEmail);
			} else {
				throw new \Exception('No administrator e-mail address has been set.');
			}
		}

		// Sender
		if ($this->objMessage instanceof EmailMessage) {
			$this->objMessage->from(new Address($this->strSender, $this->strSenderName ?? ''));
		} elseif ($this->strSenderName) {
			$this->objMessage->setFrom(array($this->strSender => $this->strSenderName));
		} else {
			$this->objMessage->setFrom($this->strSender);
		}

		// Set the return path (see #5004)
		if ($this->objMessage instanceof EmailMessage) {
			$this->objMessage->returnPath($this->senderAddress);
		} else {
			$this->objMessage->setReturnPath($this->senderAddress);
		}

		// Send the e-mail
		$this->objMailer->send($this->objMessage);

		$arrCc = $this->objMessage->getCc();
		$arrBcc = $this->objMessage->getBcc();

		// Add a log entry
		$strMessage = 'An e-mail has been sent to ';

		if ($this->objMessage instanceof EmailMessage) {
			$addresscb = static function (Address $address) {
				return $address->getAddress();
			};

			$strMessage .= implode(', ', array_map($addresscb, $this->objMessage->getTo()));

			if (!empty($arrCc)) {
				$strMessage .= ', CC to ' . implode(', ', array_map($addresscb, $arrCc));
			}

			if (!empty($arrBcc)) {
				$strMessage .= ', BCC to ' . implode(', ', array_map($addresscb, $arrBcc));
			}
		} else {
			$strMessage .= implode(', ', array_keys($this->objMessage->getTo()));

			if (!empty($arrCc)) {
				$strMessage .= ', CC to ' . implode(', ', array_keys($arrCc));
			}

			if (!empty($arrBcc)) {
				$strMessage .= ', BCC to ' . implode(', ', array_keys($arrBcc));
			}
		}

		$context = array();

		if ($this->strLogFile !== ContaoContext::EMAIL) {
			$context = array('contao' => new ContaoContext(__METHOD__, $this->strLogFile));
		}

		\Contao\System::getContainer()->get('monolog.logger.contao.email')->info($strMessage, $context);

		return true;
	}
}
