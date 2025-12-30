<?php

$GLOBALS['TL_DCA']['tl_notion_faq'] = [

    'config' => [
        'dataContainer' => 'Table',
        'enableVersioning' => true,
        'sql' => [
            'keys' => [
                'id' => 'primary',
                'notion_id' => 'unique'
            ]
        ]
    ],

    'list' => [
        'sorting' => [
            'mode' => 2,
            'fields' => ['id'],
            'flag' => 1,
            'panelLayout' => 'filter;search,limit'
        ],
        'label' => [
            'fields' => ['de_question'],
            'format' => '%s'
        ],
        'operations' => [
            'edit' => [
                'href' => 'act=edit',
                'icon' => 'edit.svg'
            ],
            'delete' => [
                'href' => 'act=delete',
                'icon' => 'delete.svg',
                'confirm' => true
            ]
        ]
    ],

    'palettes' => [
        'default' => '
            {content_legend},de_question,de_answer,en_question,en_answer;
            {meta_legend},maincluster,subcluster,status,internal_link,reference;
        '
    ],

    'fields' => [

        'id' => [
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ],

        'notion_id' => [
            'label' => ['Notion Page ID'],
            'inputType' => 'text',
            'eval' => ['readonly' => true],
            'sql' => "varchar(64) NOT NULL"
        ],

        'de_question' => [
            'label' => ['Question (DE)'],
            'inputType' => 'textarea',
            'eval' => ['readonly' => true],
            'sql' => "text NULL"
        ],

        'de_answer' => [
            'label' => ['Answer (DE)'],
            'inputType' => 'textarea',
            'eval' => ['readonly' => true],
            'sql' => "mediumtext NULL"
        ],

        'en_question' => [
            'label' => ['Question (EN)'],
            'inputType' => 'textarea',
            'eval' => ['readonly' => true],
            'sql' => "text NULL"
        ],

        'en_answer' => [
            'label' => ['Answer (EN)'],
            'inputType' => 'textarea',
            'eval' => ['readonly' => true],
            'sql' => "mediumtext NULL"
        ],

        'maincluster' => [
            'label' => ['Main Cluster'],
            'inputType' => 'text',
            'eval' => ['readonly' => true],
            'sql' => "varchar(255) NULL"
        ],

        'subcluster' => [
            'label' => ['Sub Cluster'],
            'inputType' => 'text',
            'eval' => ['readonly' => true],
            'sql' => "varchar(255) NULL"
        ],

        'status' => [
            'label' => ['Status'],
            'inputType' => 'text',
            'eval' => ['readonly' => true],
            'sql' => "varchar(64) NULL"
        ],

        'internal_link' => [
            'label' => ['Internal Link'],
            'inputType' => 'text',
            'eval' => ['readonly' => true],
            'sql' => "varchar(255) NULL"
        ],

        'reference' => [
            'label' => ['Reference'],
            'inputType' => 'text',
            'eval' => ['readonly' => true],
            'sql' => "varchar(255) NULL"
        ],
    ]
];
