<?php

namespace Bzga\BzgaBeratungsstellensucheEssstoerungen\Hooks;

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
use Bzga\BzgaBeratungsstellensuche\Domain\Model\Dto\Demand as BaseDemand;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Category;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Dto\Demand;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Targetgroup;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * @author Sebastian Schreiber
 */
class EntryRepository
{
    public function modify(array $params): void
    {
        $demand = $params['demand'] ?? null;
        /** @var $demand Demand|BaseDemand */
        if (!$demand instanceof BaseDemand) {
            return;
        }

        $query = $params['query'] ?? null;
        /** @var $query QueryInterface */
        if (!$query instanceof QueryInterface) {
            return;
        }

        $constraints = &$params['constraints'];
        /* @var $constraints array */

        // Constraints for Targetgroups
        if ($demand->getTargetgroups() && $demand->getTargetgroups()->count() > 0) {
            $targetgroupConstraints = [];
            foreach ($demand->getTargetgroups() as $targetgroup) {
                if ($targetgroup instanceof Targetgroup) {
                    $targetgroupConstraints[] = $query->contains('targetgroups', $targetgroup);
                }
            }
            if (!empty($targetgroupConstraints)) {
                $constraints[] = $query->logicalOr($targetgroupConstraints);
            }
        }

        // Constraints for extended categories
        if ($demand->getCategoriesExtended() && $demand->getCategoriesExtended()->count() > 0) {
            $categoriesExtendedConstraints = [];
            foreach ($demand->getCategoriesExtended() as $categoryExtended) {
                if ($categoryExtended instanceof Category) {
                    $categoriesExtendedConstraints[] = $query->contains('categoriesExtended', $categoryExtended);
                }
            }
            if (!empty($categoriesExtendedConstraints)) {
                $constraints[] = $query->logicalOr($categoriesExtendedConstraints);
            }
        }

        if ($demand->isForeignLanguage()) {
            $foreignLanguageConstraints = [];
            $foreignLanguageConstraints[] = $query->greaterThan('languages', 0);
            $foreignLanguageConstraints[] = $query->logicalNot($query->equals('languageOther', ''));
            if (!empty($foreignLanguageConstraints)) {
                $constraints[] = $query->logicalOr($foreignLanguageConstraints);
            }
        }
    }
}
