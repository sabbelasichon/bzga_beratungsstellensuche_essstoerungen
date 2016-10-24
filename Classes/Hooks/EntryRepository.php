<?php

namespace BZgA\BzgaBeratungsstellensucheEssstoerungen\Hooks;

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

use BZgA\BzgaBeratungsstellensuche\Domain\Model\Dto\Demand;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * @package TYPO3
 * @subpackage bzga_beratungsstellensuche_essstoerungen
 * @author Sebastian Schreiber
 */
class EntryRepository
{

    /**
     * Modify the constraints used in the query
     *
     * @param array $params
     * @return void
     */
    public function modify(array $params)
    {
        if (get_class($params['demand']) !== Demand::class) {
            return;
        }

        $query = $params['query'];
        /* @var $query QueryInterface */
        $constraints = &$params['constraints'];
        /* @var $constraints array */
        $demand = $params['demand'];
        /* @var $demand Demand */

        // Constraints for Targetgroups
        if ($demand->getTargetgroups() && $demand->getTargetgroups()->count() > 0) {
            $targetgroupConstraints = array();
            foreach ($demand->getTargetgroups() as $targetgroup) {
                $targetgroupConstraints[] = $query->contains('targetgroups', $targetgroup);
            }
            if (!empty($targetgroupConstraints)) {
                $constraints[] = $query->logicalOr($targetgroupConstraints);
            }
        }

        // Constraints for extended categories
        if ($demand->getCategoriesExtended() && $demand->getCategoriesExtended()->count() > 0) {
            $categoriesExtendedConstraints = array();
            foreach ($demand->getCategoriesExtended() as $categoryExtended) {
                $categoriesExtendedConstraints[] = $query->contains('categoriesExtended', $categoryExtended);
            }
            if (!empty($categoriesExtendedConstraints)) {
                $constraints[] = $query->logicalOr($categoriesExtendedConstraints);
            }
        }

        if ($demand->isForeignLanguage()) {
            $foreignLanguageConstraints = array();
            $foreignLanguageConstraints[] = $query->greaterThan('languages', 0);
            $foreignLanguageConstraints[] = $query->logicalNot($query->equals('languageOther', ''));
            if (!empty($foreignLanguageConstraints)) {
                $constraints[] = $query->logicalOr($foreignLanguageConstraints);
            }
        }
    }

}