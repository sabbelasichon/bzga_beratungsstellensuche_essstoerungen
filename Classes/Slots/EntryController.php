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
     *
     */
    protected $targetgroupRepository;

    /**
     * @var CategoryRepository
     *
     */
    protected $categoryRepository;

    public function injectTargetgroupRepository(TargetgroupRepository $targetgroupRepository)
    {
        $this->targetgroupRepository = $targetgroupRepository;
    }

    public function injectCategoryRepository(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param $variables
     * @return array
     */
    public function listAction($variables)
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

    /**
     * @param MvcPropertyMappingConfiguration $propertyMappingConfiguration
     */
    public function initializeAction(MvcPropertyMappingConfiguration $propertyMappingConfiguration)
    {
        $allowSubProperties = ['targetgroups', 'categoriesExtended'];

        foreach ($allowSubProperties as $allowSubProperty) {
            $propertyMappingConfiguration->forProperty($allowSubProperty)->allowAllProperties();
            $propertyMappingConfiguration->allowCreationForSubProperty($allowSubProperty);
            $propertyMappingConfiguration->allowModificationForSubProperty($allowSubProperty);
        }
    }

}
