<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$fields = [
    'targetgroups' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_essstoerungen/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.targetgroups',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'internal_type' => 'db',
            'allowed' => 'tx_bzgaberatungsstellensuche_domain_model_targetgroup',
            'foreign_table' => 'tx_bzgaberatungsstellensuche_domain_model_targetgroup',
            'foreign_table_where' => 'ORDER BY tx_bzgaberatungsstellensuche_domain_model_targetgroup.title',
            'size' => 10,
            'minitems' => 0,
            'maxitems' => 100,
            'MM' => 'tx_bzgaberatungsstellensuche_entry_targetgroup_mm',
            'wizards' => [
                '_PADDING' => 0,
                '_VERTICAL' => 1,
            ],
        ],
    ],
    'measures' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_essstoerungen/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.measures',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'internal_type' => 'db',
            'allowed' => 'tx_bzgaberatungsstellensuche_domain_model_measure',
            'foreign_table' => 'tx_bzgaberatungsstellensuche_domain_model_measure',
            'foreign_table_where' => 'ORDER BY tx_bzgaberatungsstellensuche_domain_model_measure.title',
            'size' => 10,
            'minitems' => 0,
            'maxitems' => 100,
            'MM' => 'tx_bzgaberatungsstellensuche_entry_measure_mm',
            'wizards' => [
                '_PADDING' => 0,
                '_VERTICAL' => 1,
            ],
        ],
    ],
    'experts' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_essstoerungen/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.experts',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'internal_type' => 'db',
            'allowed' => 'tx_bzgaberatungsstellensuche_domain_model_expert',
            'foreign_table' => 'tx_bzgaberatungsstellensuche_domain_model_expert',
            'foreign_table_where' => 'ORDER BY tx_bzgaberatungsstellensuche_domain_model_expert.title',
            'size' => 10,
            'minitems' => 0,
            'maxitems' => 100,
            'MM' => 'tx_bzgaberatungsstellensuche_entry_expert_mm',
            'wizards' => [
                '_PADDING' => 0,
                '_VERTICAL' => 1,
            ],
        ],
    ],
    'qualifications' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_essstoerungen/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.qualifications',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'internal_type' => 'db',
            'allowed' => 'tx_bzgaberatungsstellensuche_domain_model_qualification',
            'foreign_table' => 'tx_bzgaberatungsstellensuche_domain_model_qualification',
            'foreign_table_where' => 'ORDER BY tx_bzgaberatungsstellensuche_domain_model_qualification.title',
            'size' => 10,
            'minitems' => 0,
            'maxitems' => 100,
            'MM' => 'tx_bzgaberatungsstellensuche_entry_qualification_mm',
            'wizards' => [
                '_PADDING' => 0,
                '_VERTICAL' => 1,
            ],
        ],
    ],
    'categories_extended' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_essstoerungen/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_category_extended',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'internal_type' => 'db',
            'allowed' => 'tx_bzgaberatungsstellensuche_domain_model_category_extended',
            'foreign_table' => 'tx_bzgaberatungsstellensuche_domain_model_category_extended',
            'foreign_table_where' => 'ORDER BY tx_bzgaberatungsstellensuche_domain_model_category_extended.title',
            'size' => 10,
            'minitems' => 0,
            'maxitems' => 100,
            'MM' => 'tx_bzgaberatungsstellensuche_entry_category_extended_mm',
            'wizards' => [
                '_PADDING' => 0,
                '_VERTICAL' => 1,
            ],
        ],
    ],
    'languages' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_essstoerungen/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.languages',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'internal_type' => 'db',
            'allowed' => 'static_languages',
            'foreign_table' => 'static_languages',
            'size' => 10,
            'minitems' => 0,
            'maxitems' => 100,
            'MM' => 'tx_bzgaberatungsstellensuche_entry_language_mm',
            'wizards' => [
                '_PADDING' => 0,
                '_VERTICAL' => 1,
            ],
        ],
    ],
    'category_extended_other' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_essstoerungen/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.category_extended_other',
        'config' => [
            'type' => 'input',
            'size' => 30,
            'eval' => 'trim',
        ],
    ],
    'language_other' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_essstoerungen/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.language_other',
        'config' => [
            'type' => 'input',
            'size' => 30,
            'eval' => 'trim',
        ],
    ],
    'targetgroup_other' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_essstoerungen/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.targetgroup_other',
        'config' => [
            'type' => 'input',
            'size' => 30,
            'eval' => 'trim',
        ],
    ],
    'measure_other' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_essstoerungen/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_entry.measure_other',
        'config' => [
            'type' => 'input',
            'size' => 30,
            'eval' => 'trim',
        ],
    ],
    'institution_type' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:bzga_beratungsstellensuche_essstoerungen/Resources/Private/Language/locallang_db.xlf:tx_bzgaberatungsstellensuche_domain_model_type',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['', 0],
            ],
            'foreign_table' => 'tx_bzgaberatungsstellensuche_domain_model_type',
            'minitems' => 0,
            'maxitems' => 1,
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'tx_bzgaberatungsstellensuche_domain_model_entry',
    $fields
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_bzgaberatungsstellensuche_domain_model_entry',
    implode(',', array_keys($fields)),
    '',
    'after:categories'
);
