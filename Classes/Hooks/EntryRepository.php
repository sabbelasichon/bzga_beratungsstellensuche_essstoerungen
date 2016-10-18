<?php


namespace BZgA\BzgaBeratungsstellensucheEssstoerungen\Hooks;

use BZgA\BzgaBeratungsstellensuche\Domain\Model\Dto\Demand;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

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

        /*if ($demand->getMeasures() && $demand->getMeasures()->count() > 0) {
            $measuresContraints = array();
            foreach ($demand->getMeasures() as $measure) {
                $measuresContraints[] = $query->contains('measures', $measure);
            }
            if (!empty($measuresContraints)) {
                $constraints[] = $query->logicalOr($measuresContraints);
            }
        }*/
        // Constraints for Measures

        // Constraints for Qualifications
        /*if ($demand->getQualifications() && $demand->getQualifications()->count() > 0) {
            $qualificationsConstraints = array();
            foreach ($demand->getQualifications() as $qualification) {
                $qualificationsConstraints[] = $query->contains('qualifications', $qualification);
            }
            if (!empty($qualificationsConstraints)) {
                $constraints[] = $query->logicalOr($qualificationsConstraints);
            }
        }*/
        // Constraints for Experts
        /*if ($demand->getExperts() && $demand->getExperts()->count() > 0) {
            $expertsConstraints = array();
            foreach ($demand->getExperts() as $expert) {
                $expertsConstraints[] = $query->contains('experts', $expert);
            }
            if (!empty($expertsConstraints)) {
                $constraints[] = $query->logicalOr($expertsConstraints);
            }
        }*/

    }

}