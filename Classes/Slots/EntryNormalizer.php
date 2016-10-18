<?php


namespace BZgA\BzgaBeratungsstellensucheEssstoerungen\Slots;

use \BZgA\BzgaBeratungsstellensuche\Domain\Serializer\Normalizer\EntryNormalizer as BaseEntryNormalizer;

class EntryNormalizer
{

    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\TargetgroupRepository
     * @inject
     */
    protected $targetgroupRepository;

    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\MeasureRepository
     * @inject
     */
    protected $measureRepository;

    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\QualificationRepository
     * @inject
     */
    protected $qualificationRepository;

    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\ExpertRepository
     * @inject
     */
    protected $expertRepository;

    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\CategoryRepository
     * @inject
     */
    protected $categoryRepository;

    /**
     * @var \SJBR\StaticInfoTables\Domain\Repository\LanguageRepository
     * @inject
     */
    protected $languageRepository;

    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\TypeRepository
     * @inject
     */
    protected $typeRepository;

    /**
     * @param array $callbacks
     * @return array
     */
    public function additionalCallbacks(array $callbacks = array())
    {


        $callbacks = array_merge($callbacks, array(
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
        ));

        return array(
            'extendedCallbacks' => $callbacks,
        );
    }

}