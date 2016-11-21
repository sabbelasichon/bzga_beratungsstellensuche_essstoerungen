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

/**
 * @package TYPO3
 * @subpackage bzga_beratungsstellensuche_essstoerungen
 * @author Sebastian Schreiber
 */
class TargetgroupManager extends AbstractManager
{

    /**
     * @var \Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\TargetgroupRepository
     * @inject
     */
    protected $repository;

    /**
     * @return \Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\TargetgroupRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }


}