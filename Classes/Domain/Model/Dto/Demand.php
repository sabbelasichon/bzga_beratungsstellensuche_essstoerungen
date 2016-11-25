<?php

namespace Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Dto;

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

/**
 * @author Sebastian Schreiber
 */
class Demand extends \Bzga\BzgaBeratungsstellensuche\Domain\Model\Dto\Demand
{

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Targetgroup>
     */
    protected $targetgroups;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Category>
     */
    protected $categoriesExtended;

    /**
     * @var bool
     */
    protected $foreignLanguage;

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getCategoriesExtended()
    {
        return $this->categoriesExtended;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $categoriesExtended
     */
    public function setCategoriesExtended($categoriesExtended)
    {
        $this->categoriesExtended = $categoriesExtended;
    }

    /**
     * @return bool
     */
    public function isForeignLanguage()
    {
        return $this->foreignLanguage;
    }

    /**
     * @param bool $foreignLanguage
     */
    public function setForeignLanguage($foreignLanguage)
    {
        $this->foreignLanguage = $foreignLanguage;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getTargetgroups()
    {
        return $this->targetgroups;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $targetgroups
     */
    public function setTargetgroups($targetgroups)
    {
        $this->targetgroups = $targetgroups;
    }
}
