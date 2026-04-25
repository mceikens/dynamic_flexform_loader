<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

$GLOBALS['TCA']['tt_content']['columns'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['columns'],
    [
        'dynamic_flexform_loader_key' => [
            'label' => 'LLL:EXT:dynamic_flexform_loader/Resources/Private/Language/locallang.xlf:tt_content.dynamic_flexform_loader_key',
            'description' => 'LLL:EXT:dynamic_flexform_loader/Resources/Private/Language/locallang.xlf:tt_content.dynamic_flexform_loader_key.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => '',
            ],
        ],
        'dynamic_flexform_loader_settings' => [
            'label' => 'LLL:EXT:dynamic_flexform_loader/Resources/Private/Language/locallang.xlf:tt_content.pi_flexform_settings',
            'description' => 'LLL:EXT:dynamic_flexform_loader/Resources/Private/Language/locallang.xlf:tt_content.pi_flexform_settings.description',
            'config' => [
                'type' => 'flex',
                'ds' => [
                    'default' => 'FILE:EXT:dynamic_flexform_loader/Configuration/FlexForms/DynamicFlexformLoader.xml',
                ],
            ],
        ],
    ]
);

ExtensionManagementUtility::addTCAcolumns('tt_content', $GLOBALS['TCA']['tt_content']['columns']);

ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;LLL:EXT:dynamic_flexform_loader/Resources/Private/Language/locallang.xlf:tt_content.tabs.advanced_settings,
        dynamic_flexform_loader_key,
        dynamic_flexform_loader_settings',
    '',
    'after:categories'
);