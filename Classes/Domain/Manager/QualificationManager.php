<?php

namespace Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Manager;

/**
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
use Bzga\BzgaBeratungsstellensuche\Domain\Manager\AbstractManager;
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
    public function getRepository(): QualificationRepository
    {
        return $this->repository;
    }

    public function injectRepository(QualificationRepository $repository)
    {
        $this->repository = $repository;
    }
}
