<?php

namespace BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model;


class Entry extends \BZgA\BzgaBeratungsstellensuche\Domain\Model\Entry
{

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Targetgroup>
     */
    protected $targetgroups;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Measure>
     */
    protected $measures;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Expert>
     */
    protected $experts;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Qualification>
     */
    protected $qualifications;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Category>
     */
    protected $categoriesExtended;

    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Type
     */
    protected $institutionType;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SJBR\StaticInfoTables\Domain\Model\Language>
     */
    protected $languages;

    /**
     * @var string
     */
    protected $categoryExtendedOther;

    /**
     * @var string
     */
    protected $languageOther;

    /**
     * @var string
     */
    protected $measureOther;

    /**
     * @var string
     */
    protected $targetgroupOther;

    /**
     * @var array
     */
    protected $allMeasures = null;

    /**
     * @var array
     */
    protected $allLanguages = null;

    /**
     * @var array
     */
    protected $allCategoriesExtended = null;

    /**
     * @var array
     */
    protected $allTargetgroups = null;

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getMeasures()
    {
        return $this->measures;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $measures
     */
    public function setMeasures($measures)
    {
        $this->measures = $measures;
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

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getExperts()
    {
        return $this->experts;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $experts
     */
    public function setExperts($experts)
    {
        $this->experts = $experts;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getQualifications()
    {
        return $this->qualifications;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $qualifications
     */
    public function setQualifications($qualifications)
    {
        $this->qualifications = $qualifications;
    }

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
     * @return string
     */
    public function getCategoryExtendedOther()
    {
        return $this->categoryExtendedOther;
    }

    /**
     * @param string $categoryExtendedOther
     */
    public function setCategoryExtendedOther($categoryExtendedOther)
    {
        $this->categoryExtendedOther = $categoryExtendedOther;
    }

    /**
     * @return Type
     */
    public function getInstitutionType()
    {
        return $this->institutionType;
    }

    /**
     * @param Type $institutionType
     */
    public function setInstitutionType($institutionType)
    {
        $this->institutionType = $institutionType;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $languages
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;
    }

    /**
     * @return string
     */
    public function getLanguageOther()
    {
        return $this->languageOther;
    }

    /**
     * @param string $languageOther
     */
    public function setLanguageOther($languageOther)
    {
        $this->languageOther = $languageOther;
    }

    /**
     * @return string
     */
    public function getMeasureOther()
    {
        return $this->measureOther;
    }

    /**
     * @param string $measureOther
     */
    public function setMeasureOther($measureOther)
    {
        $this->measureOther = $measureOther;
    }

    /**
     * @return string
     */
    public function getTargetgroupOther()
    {
        return $this->targetgroupOther;
    }

    /**
     * @param string $targetgroupOther
     */
    public function setTargetgroupOther($targetgroupOther)
    {
        $this->targetgroupOther = $targetgroupOther;
    }

    /**
     * @return array
     */
    public function getAllMeasures()
    {
        if (null === $this->allMeasures) {
            $this->allMeasures = $this->measures->toArray();
            if (!empty($this->measureOther)) {
                $this->allMeasures[] = $this->measureOther;
            }
        }

        return $this->allMeasures;
    }

    /**
     * @return array
     */
    public function getAllTargetgroups()
    {
        if (null === $this->allTargetgroups) {
            $this->allTargetgroups = $this->targetgroups->toArray();
            if (!empty($this->targetgroupOther)) {
                $this->allTargetgroups[] = $this->targetgroupOther;
            }
        }

        return $this->allTargetgroups;
    }

    /**
     * @return array
     */
    public function getAllCategoriesExtended()
    {
        if (null === $this->allCategoriesExtended) {
            $this->allCategoriesExtended = $this->categoriesExtended->toArray();
            if (!empty($this->categoryExtendedOther)) {
                $this->allCategoriesExtended[] = $this->categoryExtendedOther;
            }
        }

        return $this->allCategoriesExtended;
    }

    /**
     * @return array
     */
    public function getAllLanguages()
    {
        if (null === $this->allLanguages) {
            $this->allLanguages = $this->languages->toArray();
            if (!empty($this->languageOther)) {
                $this->allLanguages[] = $this->languageOther;
            }
        }

        return $this->allLanguages;
    }

}