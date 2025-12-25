<?php

$GLOBALS['TL_DCA']['tl_notion_faq_settings'] = [

    'config' => [
        'dataContainer' => 'Table',
        'sql' => [
            'keys' => [
                'id' => 'primary'
            ]
        ]
    ],

    'list' => [
        'sorting' => [
            'mode' => 1,
            'fields' => ['id']
        ],
        'label' => [
            'fields' => ['database_id'],
            'format' => 'Notion FAQ Settings (DB: %s)'
        ],
        'global_operations' => [
            'sync' => [
                'label' => ['Sync now', 'Fetch latest FAQs from Notion'],
                'href'  => 'key=sync',
                'class' => 'header_sync',
                'icon'  => 'system/themes/flexible/icons/refresh.svg',
            ],
        ],
        'operations' => [
            'edit' => [
                'href' => 'act=edit',
                'icon' => 'edit.svg'
            ],
        ]
    ],

    'palettes' => [
        'default' => '
            {notion_legend},notion_token,database_id;
            {sync_legend},allowed_statuses,last_sync;
        '
    ],

    'fields' => [

        'id' => [
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ],

        'notion_token' => [
            'label'     => ['Notion API Token', 'Integration token from Notion'],
            'inputType' => 'text',
            'eval'      => ['mandatory' => true, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],

        'database_id' => [
            'label'     => ['Database ID', 'Notion database ID'],
            'inputType' => 'text',
            'eval'      => ['mandatory' => true, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],

        'allowed_statuses' => [
            'label'     => ['Allowed statuses'],
            'inputType' => 'checkbox',
            'options'   => ['Published', 'In progress', 'Draft'],
            'eval'      => ['multiple' => true],
            'sql'       => "text NULL"
        ],

        'last_sync' => [
            'label'     => ['Last sync'],
            'inputType' => 'text',
            'eval'      => ['readonly' => true],
            'sql'       => "datetime NULL"
        ],
        'tstamp' => [
            'sql' => "int(10) unsigned NOT NULL default 0"
        ],
    ]
];
