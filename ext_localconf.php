<?php


if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\Bzga\BzgaBeratungsstellensuche\Utility\ExtensionManagementUtility::registerExtensionKey($_EXTKEY, 50);

/** @var \TYPO3\CMS\Extbase\SignalSlot\Dispatcher $signalSlotDispatcher */
$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);

// Extend name converter
$signalSlotDispatcher->connect(
    \Bzga\BzgaBeratungsstellensuche\Domain\Serializer\NameConverter\EntryNameConverter::class,
    \Bzga\BzgaBeratungsstellensuche\Events::SIGNAL_MAP_NAMES,
    \Bzga\BzgaBeratungsstellensucheEssstoerungen\Slots\EntryNameConverter::class,
    'mapNames'
);

$signalSlotDispatcher->connect(
    \Bzga\BzgaBeratungsstellensuche\Domain\Serializer\Normalizer\EntryNormalizer::class,
    \Bzga\BzgaBeratungsstellensuche\Events::DENORMALIZE_CALLBACKS_SIGNAL,
    \Bzga\BzgaBeratungsstellensucheEssstoerungen\Slots\EntryNormalizer::class,
    'additionalCallbacks'
);

// Extend Importer
$signalSlotDispatcher->connect(
    \Bzga\BzgaBeratungsstellensuche\Service\Importer\XmlImporter::class,
    \Bzga\BzgaBeratungsstellensuche\Events::PRE_IMPORT_SIGNAL,
    \Bzga\BzgaBeratungsstellensucheEssstoerungen\Slots\Importer::class,
    'preImport'
);

// Extend list view
$signalSlotDispatcher->connect(
    \Bzga\BzgaBeratungsstellensuche\Controller\EntryController::class,
    \Bzga\BzgaBeratungsstellensuche\Events::LIST_ACTION_SIGNAL,
    \Bzga\BzgaBeratungsstellensucheEssstoerungen\Slots\EntryController::class,
    'listAction'
);

// Extend form view
$signalSlotDispatcher->connect(
    \Bzga\BzgaBeratungsstellensuche\Controller\EntryController::class,
    \Bzga\BzgaBeratungsstellensuche\Events::FORM_ACTION_SIGNAL,
    \Bzga\BzgaBeratungsstellensucheEssstoerungen\Slots\EntryController::class,
    'listAction'
);

$signalSlotDispatcher->connect(
    \Bzga\BzgaBeratungsstellensuche\Controller\EntryController::class,
    \Bzga\BzgaBeratungsstellensuche\Events::INITIALIZE_ACTION_SIGNAL,
    \Bzga\BzgaBeratungsstellensucheEssstoerungen\Slots\EntryController::class,
    'initializeAction'
);

$signalSlotDispatcher->connect(
    \Bzga\BzgaBeratungsstellensuche\Domain\Repository\EntryRepository::class,
    \Bzga\BzgaBeratungsstellensuche\Events::TABLE_TRUNCATE_ALL_SIGNAL,
    \Bzga\BzgaBeratungsstellensucheEssstoerungen\Slots\EntryRepository::class,
    'truncate'
);

// Extend the demand query
$GLOBALS['TYPO3_CONF_VARS']['EXT']['bzga_beratungsstellensuche']['Domain/Repository/EntryRepository.php']['findDemanded'][]
    = 'EXT:bzga_beratungsstellensuche_essstoerungen/Classes/Hooks/EntryRepository.php:Bzga\\BzgaBeratungsstellensucheEssstoerungen\\Hooks\\EntryRepository->modify';

# Extend the form fields in flexforms
$fields = [
    [
        'LLL:EXT:bzga_beratungsstellensuche_essstoerungen/Resources/Private/Language/locallang_be.xlf:flexforms_additional.formFields.targetgroups',
        'targetgroups',
    ],
    [
        'LLL:EXT:bzga_beratungsstellensuche_essstoerungen/Resources/Private/Language/locallang_be.xlf:flexforms_additional.formFields.categories_extended',
        'categories_extended',
    ],
    [
        'LLL:EXT:bzga_beratungsstellensuche_essstoerungen/Resources/Private/Language/locallang_be.xlf:flexforms_additional.formFields.foreign_language',
        'foreign_language',
    ],
];
\Bzga\BzgaBeratungsstellensuche\Utility\ExtensionManagementUtility::addAdditionalFormFields($fields);
