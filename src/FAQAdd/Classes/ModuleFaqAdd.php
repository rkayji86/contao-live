<?php

namespace FAQAdd\Classes;

use Contao\BackendTemplate;
use Contao\Environment;
use Contao\Input;
use Contao\PageModel;

class ModuleFaqAdd extends \Contao\Module
{
    protected $strTemplate = 'mod_faqadd';
    private $db;

    public function __construct()
    {
        $currentAlias = $GLOBALS['objPage']->alias;

        if ((stripos($currentAlias, 'clusters') !== false) || (stripos($currentAlias, 'international') !== false)) {
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

        // Get selected international from URL parameter
        $selectedInternational = Input::get('region');
        $this->Template->hasInternationalFilter = (bool) $selectedInternational;
        $this->Template->selectedInternational = $selectedInternational;
        $this->selectedInternational = $selectedInternational;

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

        if ($selectedInternational) {
            $sql .= " AND maincluster = ?";
            $params[] = $selectedInternational;
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
        $this->Template->subClustersTitle =  $selectedInternational ? 'Countries' : ($this->subClustersTitle ? $this->subClustersTitle : 'Sub Clusters');
        $this->Template->sidebarCategories = $this->getSidebarCategories();

        // Render sub-templates
        $this->Template->heroSection = $this->renderSubTemmplate('faq_hero_section');
        $this->Template->clustersSection = $this->renderSubTemplate('faq_clusters_section');
        $this->Template->recentQuestionsSection = $this->renderSubTemplate('faq_recent_questions');
        $this->Template->internationalSection = $this->renderSubTemplate('faq_international_section');
        $this->Template->subClustersSection = $this->renderSubTemplate('faq_sub_clusters_section');
        $this->Template->subClustersRegionSection = $this->renderSubTemplate('faq_sub_clusters_region_section');
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
     * Get the current language root page ID
     */
    private function getCurrentRootPageId()
    {
        global $objPage;
        
        // Get the root page ID from current page
        $rootPage = \PageModel::findByPk($objPage->rootId);
        
        return $rootPage ? $rootPage->id : null;
    }

    /**
     * Get clusters data
     */
    private function getClusters(): array
    {
        $db = $this->db;

        $currentRootId = $this->getCurrentRootPageId();

        // Find published clusters page in current language root
        $clustersPage = null;
        
        if ($currentRootId) {
            // Find page with matching alias under the current root
            $result = $db->prepare("
                SELECT * FROM tl_page 
                WHERE alias = ? 
                AND published = ? 
                AND pid = ?
                LIMIT 1
            ")->execute('clusters', '1', $currentRootId);
            
            if ($result->numRows > 0) {
                $clustersPage = \PageModel::findByPk($result->id);
            }
        }

        // Fallback: find any published clusters page
        if (!$clustersPage) {
            $clustersPage = \PageModel::findOneBy(
                ['tl_page.alias=?', 'tl_page.published=?'],
                ['clusters', '1']
            );
        }

        $activeCluster = \Contao\Input::get('cluster');

        $objClusters = $db->execute("
        SELECT DISTINCT maincluster
        FROM tl_notion_faq
        WHERE maincluster IS NOT NULL
          AND maincluster != ''
          AND (status IS NULL OR status != 'deleted')
          AND maincluster NOT LIKE '%continent%'
        ORDER BY maincluster
    ");

        $clusters = [];

        while ($objClusters->next()) {
            $baseUrl = $clustersPage ? $clustersPage->getAbsoluteUrl() : '#';
            
            $clusters[] = [
                'title'       => $objClusters->maincluster,
                'url'         => $baseUrl . '?cluster=' . urlencode($objClusters->maincluster),
                'active'      => ($objClusters->maincluster === $activeCluster),
                'description' => 'Legal frameworks and compliance requirements for voucher systems',
                'icon'        => 'files/templates/images/mdi_legal.png',
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
        $db = $this->db;

        $currentRootId = $this->getCurrentRootPageId();

        // Find published international page in current language root
        $internationalPage = null;
        
        if ($currentRootId) {
            // Find page with matching alias under the current root
            $result = $db->prepare("
                SELECT * FROM tl_page 
                WHERE alias = ? 
                AND published = ? 
                AND pid = ?
                LIMIT 1
            ")->execute('international', '1', $currentRootId);
            
            if ($result->numRows > 0) {
                $internationalPage = \PageModel::findByPk($result->id);
            }
        }

        // Fallback: find any published international page
        if (!$internationalPage) {
            $internationalPage = \PageModel::findOneBy(
                ['tl_page.alias=?', 'tl_page.published=?'],
                ['international', '1']
            );
        }

        $activeRegion = \Contao\Input::get('region');

        $objClusters = $db->execute("
        SELECT DISTINCT maincluster
        FROM tl_notion_faq
        WHERE maincluster IS NOT NULL
        AND maincluster != ''
        AND (status IS NULL OR status != 'deleted')
        AND maincluster LIKE '%continent%'
        ORDER BY maincluster
    ");

        $regions = [];

        while ($objClusters->next()) {
            $baseUrl = $internationalPage ? $internationalPage->getAbsoluteUrl() : '#';
            
            $regions[] = [
                'name'   => $objClusters->maincluster,
                'url'    => $baseUrl . '?region=' . urlencode($objClusters->maincluster),
                'active' => ($objClusters->maincluster === $activeRegion),
                'icon'   => 'files/templates/images/mdi_legal.png',
            ];
        }

        return $regions;
    }

    /**
     * Get sidebar categories for sub-clusters
     */
    private function getSidebarCategories()
    {
        $db = $this->db;
        $selectedCluster = \Contao\Input::get('cluster');
        $selectedRegion = \Contao\Input::get('region');

        $sql = "
            SELECT DISTINCT maincluster, subcluster
            FROM tl_notion_faq
            WHERE subcluster IS NOT NULL
            AND subcluster != ''
            AND (status IS NULL OR status != 'deleted')
        ";

        $params = [];

        if ($selectedCluster) {
            $sql .= " AND maincluster = ?";
            $params[] = $selectedCluster;
        }

        if ($selectedRegion) {
            $sql .= " AND maincluster = ?";
            $params[] = $selectedRegion;
        }

        $sql .= " ORDER BY maincluster, subcluster";

        $stmt = $db->prepare($sql)->execute(...$params);

        $categories = [];

        while ($stmt->next()) {
            $slug = strtolower(\StringUtil::standardize($stmt->subcluster));

            $categories[] = [
                'maincluster'   => $stmt->maincluster,
                'name'          => $stmt->subcluster,
                'data-category' => $slug,
                'slug'          => $slug,
                'active'        => false,
                'icon'          => 'files/templates/images/mdi_legal.png',
            ];
        }

        // Optional default active
        if (!empty($categories)) {
            $categories[0]['active'] = true;
        }

        return $categories;
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

        // Add cluster filter
        if ($this->selectedCluster) {
            $sql .= " AND maincluster = ?";
            $params[] = $this->selectedCluster;
        }

        // Add region/international filter
        if ($this->selectedInternational) {
            $sql .= " AND maincluster = ?";
            $params[] = $this->selectedInternational;
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
            $mainCluster = $objFaqs->maincluster ?: '';

            if (!isset($grouped[$sub])) {
                $grouped[$sub] = [];
            }

            $grouped[$sub][] = [
                'question' => $question,
                'answer' => nl2br($answer),
                'subcluster' => $sub,
                'maincluster' => $mainCluster
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

        if ($templateName === 'faq_sub_clusters_section' || $templateName === 'faq_sub_clusters_region_section') {
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
        } elseif ($templateName === 'faq_clusters_section') {
            $subTemplate->clusters = $this->Template->clusters;
            $subTemplate->clustersTitle = $this->Template->clustersTitle;
            $subTemplate->selectedCluster = $this->Template->selectedCluster;
        } elseif ($templateName === 'faq_questions_only') {
            $subTemplate->selectedCluster = $this->Template->selectedCluster;
            $subTemplate->faq = $this->Template->faq;
        }

        return $subTemplate->parse();
    }
}
