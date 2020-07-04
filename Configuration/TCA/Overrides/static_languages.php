<?php

defined('TYPO3_MODE') || die('Access denied.');

$additionalFields = [
    'lg_name_en' => 'external_id',
];

\Bzga\BzgaBeratungsstellensuche\Utility\ExtensionManagementUtility::addAdditionalFieldsToTable(
    $additionalFields,
    'static_languages'
);

unset($additionalFields);
