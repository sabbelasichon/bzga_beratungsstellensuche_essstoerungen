<?php

/*
 * This file is part of the "bzga_beratungsstellensuche_essstoerungen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheEssstoerungen\Slots;

use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\CategoryRepository;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\TargetgroupRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\MvcPropertyMappingConfiguration;

/**
 * @author Sebastian Schreiber
 */
class EntryController
{

    /**
     * @var TargetgroupRepository
     */
    protected $targetgroupRepository;

    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    public function injectTargetgroupRepository(TargetgroupRepository $targetgroupRepository): void
    {
        $this->targetgroupRepository = $targetgroupRepository;
    }

    public function injectCategoryRepository(CategoryRepository $categoryRepository): void
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function listAction(array $variables): array
    {
        $targetgroups = $this->targetgroupRepository->findAll();
        $categoriesExtended = $this->categoryRepository->findAll();
        $variables = array_merge($variables, [
            'targetgroups' => $targetgroups,
            'categoriesExtended' => $categoriesExtended,
        ]);

        return [
            'extendedVariables' => $variables,
        ];
    }

    public function initializeAction(MvcPropertyMappingConfiguration $propertyMappingConfiguration): void
    {
        $allowSubProperties = ['targetgroups', 'categoriesExtended'];

        foreach ($allowSubProperties as $allowSubProperty) {
            $propertyMappingConfiguration->forProperty($allowSubProperty)->allowAllProperties();
            $propertyMappingConfiguration->allowCreationForSubProperty($allowSubProperty);
            $propertyMappingConfiguration->allowModificationForSubProperty($allowSubProperty);
        }
    }
}
