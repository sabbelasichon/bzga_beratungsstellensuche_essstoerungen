<?php

/*
 * This file is part of the "bzga_beratungsstellensuche_essstoerungen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Manager;

use Bzga\BzgaBeratungsstellensuche\Domain\Manager\AbstractManager;
use Bzga\BzgaBeratungsstellensuche\Domain\Repository\AbstractBaseRepository;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\QualificationRepository;

/**
 * @author Sebastian Schreiber
 */
class QualificationManager extends AbstractManager
{

    /**
     * @var QualificationRepository
     */
    protected $repository;

    /**
     * @return QualificationRepository
     */
    public function getRepository(): AbstractBaseRepository
    {
        return $this->repository;
    }

    public function injectRepository(QualificationRepository $repository): void
    {
        $this->repository = $repository;
    }
}
