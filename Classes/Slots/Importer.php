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

use Bzga\BzgaBeratungsstellensuche\Service\Importer\XmlImporter;
use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Targetgroup;
use BZgA\BzgaBeratungsstellensuche\Domain\Serializer\Serializer as BaseSerializer;
use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Measure;
use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Expert;
use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Qualification;
use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Type;
use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Category;

/**
 * @package TYPO3
 * @subpackage bzga_beratungsstellensuche_essstoerungen
 * @author Sebastian Schreiber
 */
class Importer
{

    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Manager\TargetgroupManager
     * @inject
     */
    protected $targetgroupManager;

    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Manager\MeasureManager
     * @inject
     */
    protected $measureManager;

    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Manager\QualificationManager
     * @inject
     */
    protected $qualificationManager;

    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Manager\ExpertManager
     * @inject
     */
    protected $expertManager;

    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Manager\TypeManager
     * @inject
     */
    protected $typeManager;

    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Manager\CategoryManager
     * @inject
     */
    protected $categoryExtendedManager;

    /**
     * @param XmlImporter $importer
     * @param \SimpleXMLIterator $sxe
     * @param $pid
     * @param BaseSerializer $serializer
     */
    public function preImport(XmlImporter $importer, \SimpleXMLIterator $sxe, $pid, BaseSerializer $serializer)
    {
        # Import Zielgruppen
        $importer->convertRelations($sxe->zielgruppen->zielgruppe, $this->targetgroupManager, Targetgroup::class, $pid);

        # Import Maßnahmen
        $importer->convertRelations($sxe->massnahmen->massnahme, $this->measureManager, Measure::class, $pid);

        # Import Experten
        $importer->convertRelations($sxe->experten->experte, $this->expertManager, Expert::class, $pid);

        # Import Qualifications
        $importer->convertRelations($sxe->qualifikationen->qualifikation, $this->qualificationManager,
            Qualification::class, $pid);

        # Import Categories extended
        $importer->convertRelations($sxe->beratungsarten2->beratungsart2, $this->categoryExtendedManager,
            Category::class, $pid);

        # Import Types
        $importer->convertRelations($sxe->einrichtungsarten->einrichtungsart, $this->typeManager, Type::class, $pid);

        $this->measureManager->persist();
        $this->targetgroupManager->persist();
        $this->expertManager->persist();
        $this->qualificationManager->persist();
        $this->categoryExtendedManager->persist();
        $this->typeManager->persist();
    }

}