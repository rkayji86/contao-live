<?php

namespace FAQAddBundle;

$GLOBALS['FE_MOD']['faq']['faqadd']  = 'FAQAdd\Classes\ModuleFaqAdd';

$GLOBALS['BE_MOD']['content']['notion_faq'] = [
    'tables' => ['tl_notion_faq_settings','tl_notion_faq'],
    'icon'   => 'system/themes/flexible/icons/settings.svg',
    'sync'   => ['\FAQAdd\Backend\NotionFaqSync', 'run'],
];