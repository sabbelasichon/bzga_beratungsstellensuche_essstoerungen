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
use Bzga\BzgaBeratungsstellensuche\Domain\Repository\AbstractBaseRepository;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\TypeRepository;

/**
 * @author Sebastian Schreiber
 */
class TypeManager extends AbstractManager
{

    /**
     * @var TypeRepository
     */
    protected $repository;

    /**
     * @return TypeRepository
     */
    public function getRepository(): AbstractBaseRepository
    {
        return $this->repository;
    }

    public function injectRepository(TypeRepository $repository): void
    {
        $this->repository = $repository;
    }
}
