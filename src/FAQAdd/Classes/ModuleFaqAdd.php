<?php

namespace FAQAdd\Classes;

use Contao\BackendTemplate;
use Contao\Environment;
use Contao\Input;

class ModuleFaqAdd extends \Contao\Module
{
    protected $strTemplate = 'mod_faqadd';
    private $db;

    public function __construct()
    {
        $currentAlias = $GLOBALS['objPage']->alias;

        if (stripos($currentAlias, 'clusters') !== false) {
            $this->strTemplate = 'mod_faqadd_clusters';
        }
        $this->db = \Database::getInstance();
    }

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
        // Detect frontend language (Contao standard)
        $lang = $GLOBALS['TL_LANGUAGE'] ?? 'de';

        // Get selected cluster from URL parameter
        $selectedCluster = Input::get('cluster');
        $this->Template->hasClusterFilter = (bool) $selectedCluster;
        $this->Template->selectedCluster = $selectedCluster;
        $this->selectedCluster = $selectedCluster;

        $db = $this->db;

        // Fetch all FAQ records (adjust status filter if needed)
        $sql = "
                SELECT *
                FROM tl_notion_faq
                WHERE (status IS NULL OR status != 'deleted')
            ";

        $params = [];

        if ($selectedCluster) {
            $sql .= " AND maincluster = ?";
            $params[] = $selectedCluster;
        }

        $sql .= " ORDER BY id ASC";
        $objFaqs = $db->prepare($sql)->execute(...$params);

        $notionFaq = [];

        while ($objFaqs->next()) {

            // Language-based question/answer
            if ($lang === 'de') {
                $question = $objFaqs->de_question;
                $answer   = $objFaqs->de_answer;
            } else {
                $question = $objFaqs->en_question;
                $answer   = $objFaqs->en_answer;
            }

            if (!$question || !$answer) {
                continue;
            }

            $notionFaq[] = [
                'question' => $question,
                'answer'   => nl2br($answer),
                'class'    => '',
                'lang'     => $lang
            ];
        }

        // Main FAQ data
        $this->Template->faq = [
            [
                'title' => 'FAQ',
                'items' => $notionFaq,
                'class' => ''
            ]
        ];

        // Hero Section
        $this->Template->heroTitle = $this->heroTitle ?: 'How can we help?';
        $this->Template->searchPlaceholder = $this->searchPlaceholder ?: 'Search for answers...';
        $this->Template->featuredItems = $this->getFeaturedItems($notionFaq);
        $this->Template->popularTopics = $this->getPopularTopics();
        $this->Template->topicsTitle = $this->topicsTitle ?: 'Popular Topics:';

        // Clusters
        $this->Template->clustersTitle = $this->clustersTitle ?: 'Clusters';
        $this->Template->clusters = $this->getClusters();

        // Recent Questions
        $this->Template->recentQuestionsTitle = $this->recentQuestionsTitle ?: 'Recently Asked Questions';
        $this->Template->recentQuestions = $this->getRecentQuestions($notionFaq);

        // International
        $this->Template->internationalTitle = $this->internationalTitle ?: 'International';
        $this->Template->regions = $this->getRegions();

        // Sub Clusters
        $this->Template->subClustersTitle = $this->subClustersTitle ?: 'Sub Clusters';
        $this->Template->sidebarCategories = $this->getSidebarCategories();

        // Render sub-templates
        $this->Template->heroSection = $this->renderSubTemplate('faq_hero_section');
        $this->Template->clustersSection = $this->renderSubTemplate('faq_clusters_section');
        $this->Template->recentQuestionsSection = $this->renderSubTemplate('faq_recent_questions');
        $this->Template->internationalSection = $this->renderSubTemplate('faq_international_section');
        $this->Template->subClustersSection = $this->renderSubTemplate('faq_sub_clusters_section');
        $this->Template->questionsSection  = $this->renderSubTemplate('faq_questions_only');
    }

    /**
     * Get featured items for hero section
     */
    private function getFeaturedItems($notionFaq)
    {
        return array_slice($notionFaq, 0, 4);
    }

    /**
     * Get popular topics
     */
    private function getPopularTopics()
    {
        return ['History', 'Systems', 'Taxes', 'Marketing', 'Technology'];
    }

    /**
     * Get clusters data
     */
    private function getClusters(): array
    {
        $db = $this->db;
        $page = \PageModel::findByPk($GLOBALS['objPage']->id);

        // Find published clusters page
        $clustersPage = \PageModel::findOneBy(
            ['tl_page.alias=?', 'tl_page.published=?'],
            ['clusters', '1']
        );

        // Fallback: try to find any page with 'clusters' in alias
        if (!$clustersPage) {
            $clustersPage = \PageModel::findOneBy(
                ['tl_page.alias LIKE ?', 'tl_page.published=?'],
                ['%clusters%', '1']
            );
        }

        $activeCluster = \Contao\Input::get('cluster');

        $objClusters = $db->execute("
        SELECT DISTINCT maincluster
        FROM tl_notion_faq
        WHERE maincluster IS NOT NULL
        AND maincluster != ''
        AND (status IS NULL OR status != 'deleted')
        ORDER BY maincluster
    ");

        $clusters = [];

        while ($objClusters->next()) {
            $clusters[] = [
                'title'  => $objClusters->maincluster,
                'url'    => $clustersPage
                    ? $clustersPage->getAbsoluteUrl() . '?cluster=' . urlencode($objClusters->maincluster)
                    : '#',
                'active' => ($objClusters->maincluster === $activeCluster),
                'description' => 'Legal frameworks and compliance requirements for voucher systems',
                'icon' => 'files/templates/images/mdi_legal.png',
            ];
        }

        return $clusters;
    }

    /**
     * Get recent questions
     */
    private function getRecentQuestions($notionFaq)
    {
        return array_slice($notionFaq, 0, 5);
    }

    /**
     * Get regions for international section
     */
    private function getRegions()
    {
        return [
            ['name' => 'North America', 'url' => '#', 'icon' => 'files/templates/images/mdi_legal.png'],
            ['name' => 'Asia', 'url' => '#', 'icon' => 'files/templates/images/mdi_legal.png'],
            ['name' => 'South America', 'url' => '#', 'icon' => 'files/templates/images/mdi_legal.png'],
            ['name' => 'Africa', 'url' => '#', 'icon' => 'files/templates/images/mdi_legal.png'],
            ['name' => 'Europe', 'url' => '#', 'icon' => 'files/templates/images/mdi_legal.png'],
            ['name' => 'Australia', 'url' => '#', 'icon' => 'files/templates/images/mdi_legal.png']
        ];
    }

    /**
     * Get sidebar categories for sub-clusters
     */
    private function getSidebarCategories()
    {
        $db = $this->db;
        $objSubClusters = $db->execute("
            SELECT DISTINCT subcluster
            FROM tl_notion_faq
            WHERE subcluster IS NOT NULL
            AND subcluster != ''
            AND (status IS NULL OR status != 'deleted')
            ORDER BY subcluster
        ");

        while ($objSubClusters->next()) {
            $categories[] = [
                'name' => $objSubClusters->subcluster,
                'data-category' => strtolower(str_replace(' ', '_', $objSubClusters->subcluster)),
                'active' => false,
                'icon' => 'files/templates/images/mdi_legal.png',
            ];
        }

        if (!empty($categories)) {
            $categories[0]['active'] = true;
        }

        return $categories;

        // return [
        //     ['name' => 'Hospitality & Gastronomy', 'data-category' => 'hospitality', 'active' => true, 'icon' => 'files/templates/images/mdi_legal.png'],
        //     ['name' => 'Amusement Parks & Camping', 'data-category' => 'amusement', 'active' => false, 'icon' => 'files/templates/images/mdi_legal.png'],
        //     ['name' => 'Sports & Clubs', 'data-category' => 'sports', 'active' => false, 'icon' => 'files/templates/images/mdi_legal.png'],
        //     ['name' => 'E-Commerce & Retail', 'data-category' => 'ecommerce', 'active' => false, 'icon' => 'files/templates/images/mdi_legal.png'],
        //     ['name' => 'Cities & Tourism', 'data-category' => 'cities', 'active' => false, 'icon' => 'files/templates/images/mdi_legal.png']
        // ];
    }

    /**
     * Get grouped FAQ for sub-clusters
     */
    private function getGroupedFaq()
    {
        $lang = $GLOBALS['TL_LANGUAGE'] ?? 'de';
        $db = $this->db;

        $sql = "
            SELECT *
            FROM tl_notion_faq
            WHERE (status IS NULL OR status != 'deleted')
        ";

        $params = [];

        if ($this->selectedCluster) {
            $sql .= " AND maincluster = ?";
            $params[] = $this->selectedCluster;
        }

        $sql .= " ORDER BY subcluster, id ASC";

        $objFaqs = $db->prepare($sql)->execute(...$params);

        $grouped = [];

        while ($objFaqs->next()) {
            if ($lang === 'de') {
                $question = $objFaqs->de_question;
                $answer = $objFaqs->de_answer;
            } else {
                $question = $objFaqs->en_question;
                $answer = $objFaqs->en_answer;
            }

            if (!$question || !$answer) continue;

            $sub = $objFaqs->subcluster ?: 'Other';

            if (!isset($grouped[$sub])) {
                $grouped[$sub] = [];
            }

            $grouped[$sub][] = [
                'question' => $question,
                'answer' => nl2br($answer),
                'subcluster' => $sub
            ];
        }

        $result = [];

        foreach ($grouped as $sub => $items) {
            $result[] = [
                'title' => $sub,
                'items' => $items,
                'class' => ''
            ];
        }

        return $result;
    }

    /**
     * Render a sub-template with current template data
     */
    private function renderSubTemplate($templateName)
    {
        $subTemplate = new \Contao\FrontendTemplate($templateName);

        if ($templateName === 'faq_sub_clusters_section') {
            $subTemplate->faq = $this->getGroupedFaq();
            $subTemplate->subClustersTitle = $this->Template->subClustersTitle;
            $subTemplate->sidebarCategories = $this->Template->sidebarCategories;
        } elseif ($templateName === 'faq_recent_questions') {
            $subTemplate->recentQuestions = $this->Template->recentQuestions;
            $subTemplate->recentQuestionsTitle = $this->Template->recentQuestionsTitle;
        } elseif ($templateName === 'faq_international_section') {
            $subTemplate->regions = $this->Template->regions;
            $subTemplate->internationalTitle = $this->Template->internationalTitle;
        } elseif ($templateName === 'faq_hero_section') {
            $subTemplate->heroTitle = $this->Template->heroTitle;
            $subTemplate->searchPlaceholder = $this->Template->searchPlaceholder;
            $subTemplate->featuredItems = $this->Template->featuredItems;
            $subTemplate->popularTopics = $this->Template->popularTopics;
            $subTemplate->topicsTitle = $this->Template->topicsTitle;
        }elseif ($templateName === 'faq_clusters_section') {
            $subTemplate->clusters = $this->Template->clusters;
            $subTemplate->clustersTitle = $this->Template->clustersTitle;
            $subTemplate->selectedCluster = $this->Template->selectedCluster;
        } elseif($templateName === 'faq_questions_only') {
            $subTemplate->selectedCluster = $this->Template->selectedCluster;
            $subTemplate->faq = $this->Template->faq;
        }

        return $subTemplate->parse();
    }
}
