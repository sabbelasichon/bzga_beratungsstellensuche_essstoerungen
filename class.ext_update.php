<?php


use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Extensionmanager\Utility\InstallUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use SJBR\StaticInfoTables\Utility\DatabaseUpdateUtility;

/**
 * Class for updating the db
 */
class ext_update
{


    /**
     * Main function, returning the HTML content
     *
     * @return string HTML
     */
    public function main()
    {
        $content = '';
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $databaseUpdateUtility = $objectManager->get(DatabaseUpdateUtility::class);
        $databaseUpdateUtility->doUpdate('bzga_beratungsstellensuche_essstoerungen');

        $content .= '<p>'.LocalizationUtility::translate('updateLanguageLabels',
                'StaticInfoTables').' bzga_beratungsstellensuche_essstoerungen.</p>';

        return $content;
    }

    /**
     * @return bool
     */
    public function access()
    {
        return true;
    }
}