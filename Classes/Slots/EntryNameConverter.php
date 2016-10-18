<?php


namespace BZgA\BzgaBeratungsstellensucheEssstoerungen\Slots;


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