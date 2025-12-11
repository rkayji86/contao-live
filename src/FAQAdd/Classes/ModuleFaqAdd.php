<?php

namespace FAQAdd\Classes;

use Contao\BackendTemplate;
use Contao\Environment;
use Contao\System;
use Notion\Notion;

class ModuleFaqAdd extends \Contao\Module
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
                    $lang     = '';

                    if (!empty($props['de_question']->text) && count($props['de_question']->text) > 0) {
                        $question = $props['de_question']->text[0]->plainText;
                        $lang     = 'de';
                    } elseif (!empty($props['en_question']->text) && count($props['en_question']->text) > 0) {
                        $question = $props['en_question']->text[0]->plainText;
                        $lang     = 'en';
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
                            'class'    => '',
                            'lang' => $lang
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

        
        // Main FAQ data for sub-clusters section
        $this->Template->faq = [
            [
                'title' => 'FAQ - Notion Integrated',
                'items' => $notionFaq,
                'class' => ''
            ]
        ];

        // Hero Section Data
        $this->Template->heroTitle = $this->heroTitle ?: 'How can we help?';
        $this->Template->searchPlaceholder = $this->searchPlaceholder ?: 'Search for answers...';
        $this->Template->featuredItems = $this->getFeaturedItems($notionFaq);
        $this->Template->popularTopics = $this->getPopularTopics();
        $this->Template->topicsTitle = $this->topicsTitle ?: 'Popular Topics:';

        // Clusters Section Data
        $this->Template->clustersTitle = $this->clustersTitle ?: 'Clusters';
        $this->Template->clusters = $this->getClusters();

        // Recent Questions Section Data
        $this->Template->recentQuestionsTitle = $this->recentQuestionsTitle ?: 'Recently Asked Questions';
        $this->Template->recentQuestions = $this->getRecentQuestions($notionFaq);

        // International Section Data
        $this->Template->internationalTitle = $this->internationalTitle ?: 'International';
        $this->Template->regions = $this->getRegions();

        // Sub Clusters Section Data
        $this->Template->subClustersTitle = $this->subClustersTitle ?: 'Sub Clusters';
        $this->Template->sidebarCategories = $this->getSidebarCategories();

                
        // Render sub-templates and pass them to main template
        $this->Template->heroSection = $this->renderSubTemplate('faq_hero_section');
        $this->Template->clustersSection = $this->renderSubTemplate('faq_clusters_section');
        $this->Template->recentQuestionsSection = $this->renderSubTemplate('faq_recent_questions');
        $this->Template->internationalSection = $this->renderSubTemplate('faq_international_section');
        $this->Template->subClustersSection = $this->renderSubTemplate('faq_sub_clusters_section');
    }

    /**
     * Get featured items for hero section
     */
    private function getFeaturedItems($notionFaq)
    {
        // You can customize this logic based on your needs
        // For now, return first 4 items as featured
        return array_slice($notionFaq, 0, 4);
    }

    /**
     * Get popular topics
     */
    private function getPopularTopics()
    {
        // You can customize this based on your data or make it configurable
        return ['History', 'Systems', 'Taxes', 'Marketing', 'Technology'];
    }

    /**
     * Get clusters data
     */
    private function getClusters()
    {
        return [
            [
                'title' => 'Law & Regulation',
                'description' => 'Legal frameworks and compliance requirements for voucher systems',
                'url' => '#',
                'icon' => 'files/templates/images/mdi_legal.png'
            ],
            [
                'title' => 'Taxes & Accounting',
                'description' => 'Tax implications and accounting practices for voucher programs',
                'url' => '#',
                'icon' => 'files/templates/images/mdi_legal.png'
            ],
            [
                'title' => 'Marketing & Conversion',
                'description' => 'Strategies for using vouchers to drive customer acquisition',
                'url' => '#',
                'icon' => 'files/templates/images/mdi_legal.png'
            ],
            [
                'title' => 'Technology & Integration',
                'description' => 'Technical implementation and system integration options',
                'url' => '#',
                'icon' => 'files/templates/images/mdi_legal.png'
            ],
            [
                'title' => 'User Experience (UX) & Design',
                'description' => 'Best practices for voucher user interface and experience',
                'url' => '#',
                'icon' => 'files/templates/images/mdi_legal.png'
            ],
            [
                'title' => 'History & Market',
                'description' => 'Evolution of voucher systems and market trends',
                'url' => '#',
                'icon' => 'files/templates/images/mdi_legal.png'
            ],
            [
                'title' => 'Use Cases & Industries',
                'description' => 'Industry-specific applications and case studies',
                'url' => '#',
                'icon' => 'files/templates/images/mdi_legal.png'
            ],
            [
                'title' => 'System & Platform (Internal)',
                'description' => 'Internal system architecture and platform management',
                'url' => '#',
                'icon' => 'files/templates/images/mdi_legal.png'
            ],
            [
                'title' => 'International Validity Worldwide',
                'description' => 'Cross-border voucher acceptance and international regulations',
                'url' => '#',
                'icon' => 'files/templates/images/mdi_legal.png'
            ]
        ];
    }

    /**
     * Get recent questions
     */
    private function getRecentQuestions($notionFaq)
    {
        // Return first 5 items as recent questions
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
        return [
            ['name' => 'Hospitality & Gastronomy', 'data-category' => 'hospitality', 'active' => true, 'icon' => 'files/templates/images/mdi_legal.png'],
            ['name' => 'Amusement Parks & Camping', 'data-category' => 'amusement', 'active' => false, 'icon' => 'files/templates/images/mdi_legal.png'],
            ['name' => 'Sports & Clubs', 'data-category' => 'sports', 'active' => false, 'icon' => 'files/templates/images/mdi_legal.png'],
            ['name' => 'E-Commerce & Retail', 'data-category' => 'ecommerce', 'active' => false, 'icon' => 'files/templates/images/mdi_legal.png'],
            ['name' => 'Cities & Tourism', 'data-category' => 'cities', 'active' => false, 'icon' => 'files/templates/images/mdi_legal.png']
        ];
    }

    /**
     * Render a sub-template with current template data
     */
    private function renderSubTemplate($templateName)
    {
        $subTemplate = new \Contao\FrontendTemplate($templateName);

        // Set the FAQ data explicitly for sub-clusters section
        if ($templateName === 'faq_sub_clusters_section') {
            $subTemplate->faq = $this->Template->faq;
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
        }
        
        return $subTemplate->parse();
    }
}
