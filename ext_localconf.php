<?php


if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\BZgA\BzgaBeratungsstellensuche\Utility\ExtensionManagementUtility::registerExtensionKey($_EXTKEY, 50);

/** @var \TYPO3\CMS\Extbase\SignalSlot\Dispatcher $signalSlotDispatcher */
$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);

// Extend name converter
$signalSlotDispatcher->connect(
    \BZgA\BzgaBeratungsstellensuche\Domain\Serializer\NameConverter\EntryNameConverter::class,
    \BZgA\BzgaBeratungsstellensuche\Events::SIGNAL_MapNames,
    \BZgA\BzgaBeratungsstellensucheEssstoerungen\Slots\EntryNameConverter::class,
    'mapNames'
);

$signalSlotDispatcher->connect(
    \BZgA\BzgaBeratungsstellensuche\Domain\Serializer\Normalizer\EntryNormalizer::class,
    \BZgA\BzgaBeratungsstellensuche\Events::DENORMALIZE_CALLBACKS_SIGNAL,
    \BZgA\BzgaBeratungsstellensucheEssstoerungen\Slots\EntryNormalizer::class,
    'additionalCallbacks'
);

// Extend Importer
$signalSlotDispatcher->connect(
    \Bzga\BzgaBeratungsstellensuche\Service\Importer\XmlImporter::class,
    \BZgA\BzgaBeratungsstellensuche\Events::PRE_IMPORT_SIGNAL,
    \BZgA\BzgaBeratungsstellensucheEssstoerungen\Slots\Importer::class,
    'preImport'
);

// Extend list view
$signalSlotDispatcher->connect(
    \BZgA\BzgaBeratungsstellensuche\Controller\EntryController::class,
    \BZgA\BzgaBeratungsstellensuche\Events::LIST_ACTION_SIGNAL,
    \BZgA\BzgaBeratungsstellensucheEssstoerungen\Slots\EntryController::class,
    'listAction'
);

// Extend form view
$signalSlotDispatcher->connect(
    \BZgA\BzgaBeratungsstellensuche\Controller\EntryController::class,
    \BZgA\BzgaBeratungsstellensuche\Events::FORM_ACTION_SIGNAL,
    \BZgA\BzgaBeratungsstellensucheEssstoerungen\Slots\EntryController::class,
    'listAction'
);

$signalSlotDispatcher->connect(
    \BZgA\BzgaBeratungsstellensuche\Controller\EntryController::class,
    \BZgA\BzgaBeratungsstellensuche\Events::INITIALIZE_ACTION_SIGNAL,
    \BZgA\BzgaBeratungsstellensucheEssstoerungen\Slots\EntryController::class,
    'initializeAction'
);


// Extend the demand query
$GLOBALS['TYPO3_CONF_VARS']['EXT']['bzga_beratungsstellensuche']['Domain/Repository/EntryRepository.php']['findDemanded'][]
    = 'EXT:bzga_beratungsstellensuche_essstoerungen/Classes/Hooks/EntryRepository.php:BZgA\\BzgaBeratungsstellensucheEssstoerungen\\Hooks\\EntryRepository->modify';

# Extend the form fields in flexforms
$fields = array(
    array(
        'LLL:EXT:bzga_beratungsstellensuche_essstoerungen/Resources/Private/Language/locallang_be.xlf:flexforms_additional.formFields.targetgroups',
        'targetgroups',
    ),
    array(
        'LLL:EXT:bzga_beratungsstellensuche_essstoerungen/Resources/Private/Language/locallang_be.xlf:flexforms_additional.formFields.categories_extended',
        'categories_extended',
    ),
    array(
        'LLL:EXT:bzga_beratungsstellensuche_essstoerungen/Resources/Private/Language/locallang_be.xlf:flexforms_additional.formFields.foreign_language',
        'foreign_language',
    ),
);
\BZgA\BzgaBeratungsstellensuche\Utility\ExtensionManagementUtility::addAdditionalFormFields($fields);
