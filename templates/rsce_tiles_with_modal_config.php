<?php
// rsce_tiles_with_modal_config.php

return [
    'label' => [
        'de' => ['Kachel-Elemente mit Modal', 'Zeigt Kacheln mit Logo, Überschrift, Teaser und Text im Modal an.'],
        'en' => ['Tiles with Modal', 'Displays tiles with logo, headline, teaser, and text in a modal.'],
    ],
    'types' => ['content'],
    'contentCategory' => 'texts',
    'standardFields' => ['headline', 'cssID'],
    'fields' => [
        'tiles' => [
            'label' => [
                'de' => ['Kacheln', 'Kachel-Elemente'],
                'en' => ['Tiles', 'Tile elements'],
            ],
            'elementLabel' => '%s. Kachel',
            'inputType' => 'list',
            'minItems' => 1,
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
                'headline' => [
                    'label' => [
                        'de' => ['Überschrift', 'Kachel-Überschrift'],
                        'en' => ['Headline', 'Tile headline'],
                    ],
                    'inputType' => 'text',
                ],
                'teaser' => [
                    'label' => [
                        'de' => ['Teaser', 'Kurzer Teaser-Text'],
                        'en' => ['Teaser', 'Short teaser text'],
                    ],
                    'inputType' => 'textarea',
                    'eval' => [
                        'rows' => 2,
                        'allowHtml' => true,
                    ],
                ],
                'longtext' => [
                    'label' => [
                        'de' => ['Volltext', 'Längerer Text für das Modal'],
                        'en' => ['Long text', 'Longer text for the modal'],
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
        ],
    ],
];