<?php
// rsce_icon_with_text_config.php

return [
    'label' => [
        'de' => ['Icon mit Text', 'Zeigt Icon mit erklärendem Text daneben an.'],
        'en' => ['Icon with text', 'Shows Icon on the left with text description on the right.'],
    ],
    'types' => ['content'],
    'contentCategory' => 'texts',
    'standardFields' => ['headline', 'cssID'],
    'fields' => [
        'logo' => [
            'label' => [
                'de' => ['Logo', 'Logo-Bild (SVG/PNG/JPG)'],
                'en' => ['Logo', 'Logo image (SVG/PNG/JPG)'],
            ],
            'inputType' => 'fileTree',
            'eval' => [
                'filesOnly' => true,
                'extensions' => 'jpg,png,svg',
                'tl_class' => 'clr',
            ],
        ],
        'text' => [
            'label' => [
                'de' => ['Text', ''],
                'en' => ['Text', ''],
            ],
            'inputType' => 'textarea',
            'eval' => [
                'rows' => 5,
                'rte' => 'tinyMCE',
                'allowHtml' => true,
            ],
        ],
        'linkTitle' => [
            'label' => [
                'de' => ['Link-Titel', 'Titel für den Link'],
                'en' => ['Link title', 'Link title'],
            ],
            'inputType' => 'text',
            'eval' => [
                'tl_class' => 'clr w50',
            ],
        ],
        'link' => [
            'label' => [
                'de' => ['Link', 'Link zur Kachel. Modal wird nicht geöffnet.'],
                'en' => ['Link', 'Link to the tile, modal will not be opened.'],
            ],
            'inputType' => 'text',
            'eval' => [
                'dcaPicker' => true,
                'tl_class' => 'w50',
            ],
        ],
        'target' => [
            'label' => [
                'de' => ['Neues Fenster', 'In neuem Fenster öffnen'],
                'en' => ['New Window', 'Open in new window'],
            ],
            'inputType' => 'checkbox',
            'eval' => [
                'tl_class' => 'clr w50',
            ],
        ],
    ],
];