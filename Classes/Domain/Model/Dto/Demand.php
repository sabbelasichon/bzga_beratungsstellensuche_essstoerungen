<?php


namespace BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Dto;


class Demand extends \BZgA\BzgaBeratungsstellensuche\Domain\Model\Dto\Demand
{

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Targetgroup>
     */
    protected $targetgroups;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Category>
     */
    protected $categoriesExtended;

    /**
     * @var boolean
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
     * @return boolean
     */
    public function isForeignLanguage()
    {
        return $this->foreignLanguage;
    }

    /**
     * @param boolean $foreignLanguage
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