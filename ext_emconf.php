<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Dynamic Flexform Loader',
    'description' => 'This extension helps us to fetch flexform settings from content element by key',
    'category' => 'plugin',
    'author' => 'Eike Drost',
    'author_email' => 'dialog@mceikens.de',
    'author_company' => 'MCEikens',
    'shy' => '',
    'priority' => '',
    'state' => 'stable',
    'uploadfolder' => false,
    'createDirs' => '',
    'clearCacheOnLoad' => true,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-13.99.99',
            'php' => '8.4.0-9.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'MCEikens\\DynamicFlexformLoader\\' => 'Classes/'
        ]
    ],
];