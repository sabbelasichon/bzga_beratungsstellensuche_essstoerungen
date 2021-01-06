<?php

/*
 * This file is part of the "bzga_beratungsstellensuche_essstoerungen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheEssstoerungen\Slots;

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

use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\CategoryRepository;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\ExpertRepository;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\MeasureRepository;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\QualificationRepository;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\TargetgroupRepository;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\TypeRepository;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * @author Sebastian Schreiber
 */
class EntryRepository
{

    /**
     * @var string
     */
    public const LANGUAGE_MM_TABLE = 'tx_bzgaberatungsstellensuche_entry_language_mm';

    public function truncate(): void
    {
        $this->getDatabaseConnectionForTable(CategoryRepository::TABLE)->truncate(CategoryRepository::TABLE);
        $this->getDatabaseConnectionForTable(CategoryRepository::MM_TABLE)->truncate(CategoryRepository::MM_TABLE);

        $this->getDatabaseConnectionForTable(TargetgroupRepository::TABLE)->truncate(TargetgroupRepository::TABLE);
        $this->getDatabaseConnectionForTable(TargetgroupRepository::MM_TABLE)->truncate(TargetgroupRepository::MM_TABLE);

        $this->getDatabaseConnectionForTable(MeasureRepository::TABLE)->truncate(MeasureRepository::TABLE);
        $this->getDatabaseConnectionForTable(MeasureRepository::MM_TABLE)->truncate(MeasureRepository::MM_TABLE);

        $this->getDatabaseConnectionForTable(ExpertRepository::TABLE)->truncate(ExpertRepository::TABLE);
        $this->getDatabaseConnectionForTable(ExpertRepository::MM_TABLE)->truncate(ExpertRepository::MM_TABLE);

        $this->getDatabaseConnectionForTable(TypeRepository::TABLE)->truncate(TypeRepository::TABLE);

        $this->getDatabaseConnectionForTable(QualificationRepository::TABLE)->truncate(QualificationRepository::TABLE);
        $this->getDatabaseConnectionForTable(QualificationRepository::MM_TABLE)->truncate(QualificationRepository::MM_TABLE);

        $this->getDatabaseConnectionForTable(self::LANGUAGE_MM_TABLE)->truncate(self::LANGUAGE_MM_TABLE);
    }

    protected function getDatabaseConnectionForTable(string $table): Connection
    {
        return GeneralUtility::makeInstance(ConnectionPool::class)
                             ->getConnectionForTable($table);
    }
}
