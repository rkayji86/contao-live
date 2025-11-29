<?php

namespace FAQAdd\Classes;
use Contao;

class ModuleFaqAdd extends \Contao\ModuleFaqList
{

	protected $strTemplate = 'mod_faqadd';

	public function generate()
	{

		if (TL_MODE == 'BE')
		{
			/** @var BackendTemplate|object $objTemplate */
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### FAQ ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		$categories = \Contao\FaqCategoryModel::findAll();
		$catarray = array();
		if ($categories !== null)
		{
			while ($categories->next())
			{
				$catarray[] = $categories->id;
			}
		}
		$this->faq_categories = $catarray;

		if (empty($this->faq_categories) || !\is_array($this->faq_categories))
		{
			return '';
		}

		if ($this->faq_readerModule > 0 && (isset($_GET['items']) || (\Config::get('useAutoItem') && isset($_GET['auto_item']))))
		{
			return $this->getFrontendModule($this->faq_readerModule, $this->strColumn);
		}

		return parent::generate();
	}


	protected function compile()
	{

		$objFaq = \FaqModel::findPublishedByPids($this->faq_categories);

		if ($objFaq === null)
		{
			$this->Template->faq = array();

			return;
		}

		$arrFaq = array_fill_keys($this->faq_categories, array());


		while ($objFaq->next())
		{
			$arrTemp = $objFaq->row();
			$arrTemp['title'] = \StringUtil::specialchars($objFaq->question, true);

			$objPid = $objFaq->getRelated('pid');

			$arrFaq[$objFaq->pid]['items'][] = $arrTemp;
			$arrFaq[$objFaq->pid]['headline'] = $objPid->headline;
			$arrFaq[$objFaq->pid]['title'] = $objPid->title;
		}

		$arrFaq = array_values(array_filter($arrFaq));

		$cat_count = 0;
		$cat_limit = \count($arrFaq);


		foreach ($arrFaq as $k=>$v)
		{
			$count = 0;
			$limit = \count($v['items']);

			for ($i=0; $i<$limit; $i++)
			{
				$arrFaq[$k]['items'][$i]['class'] = trim(((++$count == 1) ? ' first' : '') . (($count >= $limit) ? ' last' : '') . ((($count % 2) == 0) ? ' odd' : ' even'));
			}

			$arrFaq[$k]['class'] = trim(((++$cat_count == 1) ? ' first' : '') . (($cat_count >= $cat_limit) ? ' last' : '') . ((($cat_count % 2) == 0) ? ' odd' : ' even'));
		}

		$this->Template->faq = $arrFaq;
	}

}
