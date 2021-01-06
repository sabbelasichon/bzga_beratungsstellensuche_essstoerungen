<?php

/*
 * This file is part of the "bzga_beratungsstellensuche_essstoerungen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheEssstoerungen\Slots;

use Bzga\BzgaBeratungsstellensuche\Domain\Serializer\Normalizer\EntryNormalizer as BaseEntryNormalizer;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\CategoryRepository;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\ExpertRepository;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\MeasureRepository;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\QualificationRepository;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\TargetgroupRepository;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\TypeRepository;
use SJBR\StaticInfoTables\Domain\Repository\LanguageRepository;

/**
 * @author Sebastian Schreiber
 */
class EntryNormalizer
{

    /**
     * @var TargetgroupRepository
     */
    protected $targetgroupRepository;

    /**
     * @var MeasureRepository
     */
    protected $measureRepository;

    /**
     * @var QualificationRepository
     */
    protected $qualificationRepository;

    /**
     * @var ExpertRepository
     */
    protected $expertRepository;

    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var LanguageRepository
     */
    protected $languageRepository;

    /**
     * @var TypeRepository
     */
    protected $typeRepository;

    public function injectCategoryRepository(CategoryRepository $categoryRepository): void
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function injectExpertRepository(ExpertRepository $expertRepository): void
    {
        $this->expertRepository = $expertRepository;
    }

    public function injectLanguageRepository(LanguageRepository $languageRepository): void
    {
        $this->languageRepository = $languageRepository;
    }

    public function injectMeasureRepository(MeasureRepository $measureRepository): void
    {
        $this->measureRepository = $measureRepository;
    }

    public function injectQualificationRepository(QualificationRepository $qualificationRepository): void
    {
        $this->qualificationRepository = $qualificationRepository;
    }

    public function injectTargetgroupRepository(TargetgroupRepository $targetgroupRepository): void
    {
        $this->targetgroupRepository = $targetgroupRepository;
    }

    public function injectTypeRepository(TypeRepository $typeRepository): void
    {
        $this->typeRepository = $typeRepository;
    }

    public function additionalCallbacks(array $callbacks = []): array
    {
        $callbacks = array_merge($callbacks, [
            'languages' => function () {
                return BaseEntryNormalizer::convertToObjectStorage($this->languageRepository, func_get_args());
            },
            'type' => function ($externalId) {
                return $this->typeRepository->findOneByExternalId($externalId);
            },
            'measures' => function () {
                return BaseEntryNormalizer::convertToObjectStorage($this->measureRepository, func_get_args());
            },
            'targetgroups' => function () {
                return BaseEntryNormalizer::convertToObjectStorage($this->targetgroupRepository, func_get_args());
            },
            'qualifications' => function () {
                return BaseEntryNormalizer::convertToObjectStorage($this->qualificationRepository, func_get_args());
            },
            'experts' => function () {
                return BaseEntryNormalizer::convertToObjectStorage($this->expertRepository, func_get_args());
            },
            'categoriesExtended' => function () {
                return BaseEntryNormalizer::convertToObjectStorage($this->categoryRepository, func_get_args());
            },
        ]);

        return [
            'extendedCallbacks' => $callbacks,
        ];
    }
}
