<?php

namespace FAQAdd\Classes;

use Contao\BackendTemplate;
use Contao\Environment;
use Notion\Notion;

class ModuleFaqAdd extends \Contao\ModuleFaqList
{
    protected $strTemplate = 'mod_faqadd';

    public function generate()
    {
        if (TL_MODE === 'BE') {
            $objTemplate = new BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '### FAQ ADD (Notion Integrated) ###';
            $objTemplate->title    = $this->headline;
            $objTemplate->id       = $this->id;
            $objTemplate->link     = $this->name;
            $objTemplate->href     = Environment::get('request');
            return $objTemplate->parse();
        }

        return parent::generate();
    }

    protected function compile()
    {
        $token      = $_ENV['NOTION_TOKEN'] ?? null;
        $databaseId = $_ENV['NOTION_FAQ_DATABASE'] ?? null;
        $notionFaq  = [];

        if ($token && $databaseId) {
            try {
                $notion   = Notion::create($token);
                $database = $notion->databases()->find($databaseId);
                // Query database — this returns array of Page objects
                $pages    = $notion->databases()->queryAllPages($database);

                foreach ($pages as $page) {
                    $props = $page->properties;

                    // Example: choose German if exists, else English
                    $question = '';
                    $answer   = '';

                    if (!empty($props['de_question']->text) && count($props['de_question']->text) > 0) {
                        $question = $props['de_question']->text[0]->plainText;
                    } elseif (!empty($props['en_question']->text) && count($props['en_question']->text) > 0) {
                        $question = $props['en_question']->text[0]->plainText;
                    }

                    if (!empty($props['de_answer']->text) && count($props['de_answer']->text) > 0) {
                        $answer = $props['de_answer']->text[0]->plainText;
                    } elseif (!empty($props['en_answer']->text) && count($props['en_answer']->text) > 0) {
                        $answer = $props['en_answer']->text[0]->plainText;
                    }

                    if ($question !== '' && $answer !== '') {
                        $notionFaq[] = [
                            'question' => $question,
                            'answer'   => nl2br($answer),
                            'class'    => ''
                        ];
                    }
                }
            } catch (\Throwable $e) {
                $notionFaq[] = [
                    'question' => 'Notion Error',
                    'answer'   => $e->getMessage(),
                    'class'    => 'error'
                ];
            }
        }

        $this->Template->faq = [
            [
                'title' => 'FAQ',
                'items' => $notionFaq,
                'class' => ''
            ]
        ];
    }
}
