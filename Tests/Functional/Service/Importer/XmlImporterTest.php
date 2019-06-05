<?php

namespace Bzga\BzgaBeratungsstellensucheEssstoerungen\Tests\Functional\Service\Importer;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use Bzga\BzgaBeratungsstellensuche\Service\Importer\XmlImporter;
use Nimut\TestingFramework\TestCase\FunctionalTestCase;
use TYPO3\CMS\Core\Core\Bootstrap;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;
use TYPO3\CMS\Extensionmanager\Utility\UpdateScriptUtility;

class XmlImporterTest extends FunctionalTestCase
{

    /**
     * @var string
     */
    const SYS_FOLDER_FOR_ENTRIES = 10001;

    /**
     * @var ObjectManagerInterface
     */
    protected $objectManager;

    /**
     * @var XmlImporter
     */
    protected $xmlImporter;

    /**
     * To prevent some false/positive sql failures
     * @var array
     */
    protected $configurationToUseInTestInstance = [
        'SYS' => [
            'setDBinit' => 'SET SESSION sql_mode=""'
        ]
    ];

    /**
     * @var array
     */
    protected $coreExtensionsToLoad = ['extbase', 'fluid', 'extensionmanager'];

    /**
     * @var array
     */
    protected $pathsToLinkInTestInstance = [
        'typo3conf/ext/bzga_beratungsstellensuche_essstoerungen/Tests/Functional/Fixtures/Import/fileadmin/import' => 'fileadmin/import'
    ];

    /**
     * @var array
     */
    protected $testExtensionsToLoad = ['typo3conf/ext/bzga_beratungsstellensuche_essstoerungen', 'typo3conf/ext/bzga_beratungsstellensuche', 'typo3conf/ext/static_info_tables'];

    /**
     * @var array
     */
    protected $additionalFoldersToCreate = [
        'fileadmin/user_upload/tx_bzgaberatungsstellensuche'
    ];

    /**
     */
    public function setUp()
    {
        parent::setUp();
        $backendUser = $this->setUpBackendUserFromFixture(1);
        $backendUser->workspace = 0;
        Bootstrap::getInstance()->initializeLanguageObject();
        $this->objectManager   = GeneralUtility::makeInstance(ObjectManager::class);
        $this->xmlImporter = $this->objectManager->get(XmlImporter::class);

        $this->importDataSet('ntf://Database/pages.xml');
        $this->importDataSet('ntf://Database/sys_file_storage.xml');
        $this->importDataSet(__DIR__ . '/../../Fixtures/pages.xml');

        /** @var UpdateScriptUtility $updateUtility */
        $updateUtility = GeneralUtility::makeInstance(UpdateScriptUtility::class);
        $updateUtility->executeUpdateIfNeeded('static_info_tables');
        $updateUtility->executeUpdateIfNeeded('bzga_beratungsstellensuche');
        $updateUtility->executeUpdateIfNeeded('bzga_beratungsstellensuche_essstoerungen');
    }

    /**
     * @test
     */
    public function importFromFile()
    {
        $this->xmlImporter->importFromFile('fileadmin/import/beratungsstellen.xml', self::SYS_FOLDER_FOR_ENTRIES);

        $this->assertEquals(3, $this->getDatabaseConnection()->exec_SELECTcountRows('*', 'tx_bzgaberatungsstellensuche_domain_model_category'));
        $this->assertEquals(1, $this->getDatabaseConnection()->exec_SELECTcountRows('*', 'tx_bzgaberatungsstellensuche_domain_model_entry'));
        $this->assertEquals(13, $this->getDatabaseConnection()->exec_SELECTcountRows('*', 'tx_bzgaberatungsstellensuche_domain_model_measure'));
        $this->assertEquals(10, $this->getDatabaseConnection()->exec_SELECTcountRows('*', 'tx_bzgaberatungsstellensuche_entry_measure_mm'));
    }

    /**
     * @test
     */
    public function externalIdForStaticLanguagesCorrectlySet()
    {
        $this->assertEquals(6, $this->getDatabaseConnection()->exec_SELECTcountRows('*', 'static_languages', 'external_id > 0'));
    }

    /**
     */
    public function tearDown()
    {
        unset($this->xmlImporter);
        unset($this->objectManager);
    }
}
