<?php

/*
 * This file is part of the "bzga_beratungsstellensuche_essstoerungen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheEssstoerungen\Tests\Functional\Service\Importer;

use Bzga\BzgaBeratungsstellensuche\Service\Importer\XmlImporter;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Tests\Functional\DatabaseTrait;
use SJBR\StaticInfoTables\Utility\DatabaseUpdateUtility;
use TYPO3\CMS\Core\Core\Bootstrap;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

class XmlImporterTest extends FunctionalTestCase
{
    use DatabaseTrait;

    /**
     * @var string
     */
    private const SYS_FOLDER_FOR_ENTRIES = 10001;

    /**
     * @var ObjectManagerInterface
     */
    protected $objectManager;

    /**
     * @var XmlImporter
     */
    protected $xmlImporter;

    /**
     * @var array
     */
    protected $coreExtensionsToLoad = ['extbase', 'fluid', 'extensionmanager'];

    /**
     * @var array
     */
    protected $pathsToLinkInTestInstance = [
        'typo3conf/ext/bzga_beratungsstellensuche_essstoerungen/Tests/Functional/Fixtures/Import/fileadmin/import' => 'fileadmin/import',
    ];

    /**
     * @var array
     */
    protected $testExtensionsToLoad = ['typo3conf/ext/static_info_tables', 'typo3conf/ext/static_info_tables_de', 'typo3conf/ext/bzga_beratungsstellensuche', 'typo3conf/ext/bzga_beratungsstellensuche_essstoerungen'];

    /**
     * @var array
     */
    protected $additionalFoldersToCreate = [
        'fileadmin/user_upload/tx_bzgaberatungsstellensuche',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $backendUser = $this->setUpBackendUserFromFixture(1);
        $backendUser->workspace = 0;
        Bootstrap::initializeLanguageObject();
        $this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $this->xmlImporter = $this->objectManager->get(XmlImporter::class);

        $this->importDataSet(__DIR__ . '/../../Fixtures/pages.xml');
        $this->importDataSet(__DIR__ . '/../../Fixtures/sys_file_storage.xml');

        /** @var ObjectManager $objectManager */
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        /** @var DatabaseUpdateUtility $databaseUpdateUtility */
        $databaseUpdateUtility = $objectManager->get(DatabaseUpdateUtility::class);
        $databaseUpdateUtility->doUpdate('bzga_beratungsstellensuche_essstoerungen');
    }

    /**
     * @test
     */
    public function importFromFile(): void
    {
        $this->xmlImporter->importFromFile('fileadmin/import/beratungsstellen.xml', self::SYS_FOLDER_FOR_ENTRIES);

        foreach ($this->xmlImporter as $value) {
            $this->xmlImporter->importEntry($value);
        }
        $this->xmlImporter->persist();

        self::assertEquals(3, $this->selectCount('*', 'tx_bzgaberatungsstellensuche_domain_model_category'));
        self::assertEquals(13, $this->selectCount('*', 'tx_bzgaberatungsstellensuche_domain_model_measure'));
        self::assertEquals(10, $this->selectCount('*', 'tx_bzgaberatungsstellensuche_entry_measure_mm'));
        self::assertEquals(1, $this->selectCount('*', 'tx_bzgaberatungsstellensuche_domain_model_entry'));
    }

    /**
     * @test
     */
    public function externalIdForStaticLanguagesCorrectlySet(): void
    {
        self::assertEquals(6, $this->selectCount('*', 'static_languages', 'external_id > 0'));
    }

    public function tearDown(): void
    {
        unset($this->xmlImporter, $this->objectManager);
    }
}
