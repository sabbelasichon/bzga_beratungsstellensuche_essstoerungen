<?php


namespace BZgA\BzgaBeratungsstellensucheEssstoerungen\Slots;

use TYPO3\CMS\Extbase\Mvc\Controller\MvcPropertyMappingConfiguration;

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