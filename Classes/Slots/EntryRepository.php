<?php


namespace Bzga\BzgaBeratungsstellensucheEssstoerungen\Slots;

use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\CategoryRepository;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\ExpertRepository;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\MeasureRepository;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\QualificationRepository;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\TargetgroupRepository;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\TypeRepository;
use TYPO3\CMS\Core\Database\DatabaseConnection;

class EntryRepository
{

    /**
     * @var string
     */
    const LANGUAGE_MM_TABLE = 'tx_bzgaberatungsstellensuche_entry_language_mm';

    /**
     * @param DatabaseConnection $databaseConnection
     */
    public function truncate(DatabaseConnection $databaseConnection)
    {
        $databaseConnection->exec_TRUNCATEquery(CategoryRepository::TABLE);
        $databaseConnection->exec_TRUNCATEquery(CategoryRepository::MM_TABLE);
        $databaseConnection->exec_TRUNCATEquery(TargetgroupRepository::TABLE);
        $databaseConnection->exec_TRUNCATEquery(TargetgroupRepository::MM_TABLE);
        $databaseConnection->exec_TRUNCATEquery(MeasureRepository::TABLE);
        $databaseConnection->exec_TRUNCATEquery(MeasureRepository::MM_TABLE);
        $databaseConnection->exec_TRUNCATEquery(ExpertRepository::TABLE);
        $databaseConnection->exec_TRUNCATEquery(ExpertRepository::MM_TABLE);
        $databaseConnection->exec_TRUNCATEquery(TypeRepository::TABLE);
        $databaseConnection->exec_TRUNCATEquery(QualificationRepository::TABLE);
        $databaseConnection->exec_TRUNCATEquery(QualificationRepository::MM_TABLE);
        $databaseConnection->exec_TRUNCATEquery(self::LANGUAGE_MM_TABLE);
    }
}
