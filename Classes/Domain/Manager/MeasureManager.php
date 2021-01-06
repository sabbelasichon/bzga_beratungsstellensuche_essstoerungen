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
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\MeasureRepository;

/**
 * @author Sebastian Schreiber
 */
class MeasureManager extends AbstractManager
{

    /**
     * @var MeasureRepository
     */
    protected $repository;

    /**
     * @return MeasureRepository
     */
    public function getRepository(): AbstractBaseRepository
    {
        return $this->repository;
    }

    public function injectRepository(MeasureRepository $repository): void
    {
        $this->repository = $repository;
    }
}
