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
use Bzga\BzgaBeratungsstellensuche\Domain\Serializer\Serializer as BaseSerializer;
use Bzga\BzgaBeratungsstellensuche\Service\Importer\XmlImporter;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Manager\CategoryManager;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Manager\ExpertManager;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Manager\MeasureManager;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Manager\QualificationManager;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Manager\TargetgroupManager;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Manager\TypeManager;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Category;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Expert;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Measure;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Qualification;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Targetgroup;
use Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Type;
use SimpleXMLIterator;

/**
 * @author Sebastian Schreiber
 */
class Importer
{

    /**
     * @var TargetgroupManager
     */
    protected $targetgroupManager;

    /**
     * @var MeasureManager
     */
    protected $measureManager;

    /**
     * @var QualificationManager
     */
    protected $qualificationManager;

    /**
     * @var ExpertManager
     */
    protected $expertManager;

    /**
     * @var TypeManager
     */
    protected $typeManager;

    /**
     * @var CategoryManager
     */
    protected $categoryExtendedManager;

    public function injectTargetgroupManager(TargetgroupManager $targetgroupManager)
    {
        $this->targetgroupManager = $targetgroupManager;
    }

    public function injectTypeManager(TypeManager $typeManager)
    {
        $this->typeManager = $typeManager;
    }

    public function injectMeasureManager(MeasureManager $measureManager)
    {
        $this->measureManager = $measureManager;
    }

    public function injectQualificationManager(QualificationManager $qualificationManager)
    {
        $this->qualificationManager = $qualificationManager;
    }

    public function injectCategoryExtendedManager(CategoryManager $categoryExtendedManager)
    {
        $this->categoryExtendedManager = $categoryExtendedManager;
    }

    public function injectExpertManager(ExpertManager $expertManager)
    {
        $this->expertManager = $expertManager;
    }

    /**
     * @param XmlImporter $importer
     * @param SimpleXMLIterator $sxe
     * @param $pid
     * @param BaseSerializer $serializer
     */
    public function preImport(XmlImporter $importer, SimpleXMLIterator $sxe, $pid, BaseSerializer $serializer)
    {
        // Import Zielgruppen
        $importer->convertRelations($sxe->zielgruppen->zielgruppe, $this->targetgroupManager, Targetgroup::class, $pid);

        // Import Maßnahmen
        $importer->convertRelations($sxe->massnahmen->massnahme, $this->measureManager, Measure::class, $pid);

        // Import Experten
        $importer->convertRelations($sxe->experten->experte, $this->expertManager, Expert::class, $pid);

        // Import Qualifications
        $importer->convertRelations(
            $sxe->qualifikationen->qualifikation,
            $this->qualificationManager,
            Qualification::class,
            $pid
        );

        // Import Categories extended
        $importer->convertRelations(
            $sxe->beratungsarten2->beratungsart2,
            $this->categoryExtendedManager,
            Category::class,
            $pid
        );

        // Import Types
        $importer->convertRelations($sxe->einrichtungsarten->einrichtungsart, $this->typeManager, Type::class, $pid);

        $this->measureManager->persist();
        $this->targetgroupManager->persist();
        $this->expertManager->persist();
        $this->qualificationManager->persist();
        $this->categoryExtendedManager->persist();
        $this->typeManager->persist();
    }
}
