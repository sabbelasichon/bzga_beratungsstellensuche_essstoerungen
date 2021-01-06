<?php

/*
 * This file is part of the "bzga_beratungsstellensuche_essstoerungen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model;

/**
 * @author Sebastian Schreiber
 */
class Entry extends \Bzga\BzgaBeratungsstellensuche\Domain\Model\Entry
{

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Targetgroup>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $targetgroups;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Measure>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $measures;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Expert>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $experts;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Qualification>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $qualifications;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Category>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $categoriesExtended;

    /**
     * @var \Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Type
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
    protected $languageOther = '';

    /**
     * @var string
     */
    protected $measureOther = '';

    /**
     * @var string
     */
    protected $targetgroupOther = '';

    /**
     * @var array
     */
    protected $allMeasures;

    /**
     * @var array
     */
    protected $allLanguages;

    /**
     * @var array
     */
    protected $allCategoriesExtended;

    /**
     * @var array
     */
    protected $allTargetgroups;

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
            if ($this->measures instanceof \TYPO3\CMS\Extbase\Persistence\ObjectStorage) {
                $this->allMeasures = $this->measures->toArray();
            } else {
                $this->allMeasures = [];
            }
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
            if ($this->targetgroups instanceof \TYPO3\CMS\Extbase\Persistence\ObjectStorage) {
                $this->allTargetgroups = $this->targetgroups->toArray();
            } else {
                $this->allTargetgroups = [];
            }
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
            if ($this->categoriesExtended instanceof \TYPO3\CMS\Extbase\Persistence\ObjectStorage) {
                $this->allCategoriesExtended = $this->categoriesExtended->toArray();
            } else {
                $this->allCategoriesExtended = [];
            }
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
            $this->allLanguages = [];
            if ($this->languages instanceof \TYPO3\CMS\Extbase\Persistence\ObjectStorage) {
                foreach ($this->languages as $language) {
                    /* @var $language \SJBR\StaticInfoTables\Domain\Model\Language */
                    $this->allLanguages[] = $language->getNameLocalized();
                }
            }
            if (!empty($this->languageOther)) {
                $this->allLanguages[] = $this->languageOther;
            }
        }

        return $this->allLanguages;
    }
}
