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

/**
 * @package TYPO3
 * @subpackage bzga_beratungsstellensuche_essstoerungen
 * @author Sebastian Schreiber
 */
class EntryNameConverter
{

    /**
     * @param array $mapNames
     * @return array
     */
    public function mapNames(array $mapNames = array())
    {
        $mapNames = array_merge($mapNames, array(
            'zielgruppe' => 'targetgroups',
            'massnahme' => 'measures',
            'fremdsprache' => 'languages',
            'zielgruppe_sons' => 'targetgroup_other',
            'fremdsprache_sons' => 'language_other',
            'massnahme_sons' => 'measure_other',
            'beratungsart2_sons' => 'category_extended_other',
            'beratungsart2' => 'categories_extended',
            'einrichtungsart' => 'institution_type',
        ));

        return array(
            'extendedMapNames' => $mapNames,
        );
    }
}