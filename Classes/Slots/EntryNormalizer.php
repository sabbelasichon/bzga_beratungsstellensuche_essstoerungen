<?php

namespace Bzga\BzgaBeratungsstellensucheEssstoerungen\Slots;

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

use Bzga\BzgaBeratungsstellensuche\Domain\Serializer\Normalizer\EntryNormalizer as BaseEntryNormalizer;

/**
 * @package TYPO3
 * @subpackage bzga_beratungsstellensuche_essstoerungen
 * @author Sebastian Schreiber
 */
class EntryNormalizer
{

    /**
     * @var \Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\TargetgroupRepository
     * @inject
     */
    protected $targetgroupRepository;

    /**
     * @var \Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\MeasureRepository
     * @inject
     */
    protected $measureRepository;

    /**
     * @var \Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\QualificationRepository
     * @inject
     */
    protected $qualificationRepository;

    /**
     * @var \Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\ExpertRepository
     * @inject
     */
    protected $expertRepository;

    /**
     * @var \Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\CategoryRepository
     * @inject
     */
    protected $categoryRepository;

    /**
     * @var \SJBR\StaticInfoTables\Domain\Repository\LanguageRepository
     * @inject
     */
    protected $languageRepository;

    /**
     * @var \Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\TypeRepository
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