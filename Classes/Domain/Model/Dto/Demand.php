<?php

/*
 * This file is part of the "bzga_beratungsstellensuche_essstoerungen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Dto;

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
    protected $foreignLanguage = false;

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
    public function isForeignLanguage(): bool
    {
        return $this->foreignLanguage;
    }

    /**
     * @param bool $foreignLanguage
     */
    public function setForeignLanguage($foreignLanguage): void
    {
        $this->foreignLanguage = (bool)$foreignLanguage;
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
    public function setTargetgroups($targetgroups): void
    {
        $this->targetgroups = $targetgroups;
    }
}
