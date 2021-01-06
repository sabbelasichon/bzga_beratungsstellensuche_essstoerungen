<?php

/*
 * This file is part of the "bzga_beratungsstellensuche_essstoerungen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheEssstoerungen\Slots;

/**
 * @author Sebastian Schreiber
 */
class EntryNameConverter
{
    public function mapNames(array $mapNames = []): array
    {
        $mapNames = array_merge($mapNames, [
            'zielgruppe' => 'targetgroups',
            'massnahme' => 'measures',
            'fremdsprache' => 'languages',
            'zielgruppe_sons' => 'targetgroup_other',
            'fremdsprache_sons' => 'language_other',
            'massnahme_sons' => 'measure_other',
            'beratungsart2_sons' => 'category_extended_other',
            'beratungsart2' => 'categories_extended',
            'einrichtungsart' => 'institution_type',
        ]);

        return [
            'extendedMapNames' => $mapNames,
        ];
    }
}
