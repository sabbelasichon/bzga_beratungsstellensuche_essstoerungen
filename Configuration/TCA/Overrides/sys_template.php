<?php

defined('TYPO3_MODE') || die('Access denied.');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'bzga_beratungsstellensuche_essstoerungen',
    'Configuration/TypoScript',
    'Beratungsstellensuche - Essstörungen'
);
