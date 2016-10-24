<?php

namespace BZgA\BzgaBeratungsstellensucheEssstoerungen\Slots;

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

use TYPO3\CMS\Extbase\Mvc\Controller\MvcPropertyMappingConfiguration;

/**
 * @package TYPO3
 * @subpackage bzga_beratungsstellensuche_essstoerungen
 * @author Sebastian Schreiber
 */
class EntryController
{

    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\TargetgroupRepository
     * @inject
     */
    protected $targetgroupRepository;

    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\CategoryRepository
     * @inject
     */
    protected $categoryRepository;

    /**
     * @param $variables
     * @return array
     */
    public function listAction($variables)
    {
        $targetgroups = $this->targetgroupRepository->findAll();
        $categoriesExtended = $this->categoryRepository->findAll();
        $variables = array_merge($variables, array(
            'targetgroups' => $targetgroups,
            'categoriesExtended' => $categoriesExtended,
        ));

        return array(
            'extendedVariables' => $variables,
        );
    }

    /**
     * @param MvcPropertyMappingConfiguration $propertyMappingConfiguration
     */
    public function initializeAction(MvcPropertyMappingConfiguration $propertyMappingConfiguration)
    {
        $allowSubProperties = array('targetgroups', 'categoriesExtended');

        foreach ($allowSubProperties as $allowSubProperty) {
            $propertyMappingConfiguration->forProperty($allowSubProperty)->allowAllProperties();
            $propertyMappingConfiguration->allowCreationForSubProperty($allowSubProperty);
            $propertyMappingConfiguration->allowModificationForSubProperty($allowSubProperty);
        }
    }

}