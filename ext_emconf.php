<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Beratungsstellensuche Essstörungen',
    'description' => 'Beratungsstellensuche der BZgA für den Bereich Essstörungen',
    'category' => 'plugin',
    'author' => 'Sebastian Schreiber',
    'author_email' => 'ssch@hauptweg-nebenwege.de',
    'author_company' => 'Hauptweg Nebenwege GmbH',
    'state' => 'beta',
    'clearCacheOnLoad' => 1,
    'version' => '8.7.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-8.7.99',
            'bzga_beratungsstellensuche' => '8.7.0',
        ],
        'conflicts' => [],
    ],
    'autoload' => [
        'psr-4' => ['Bzga\\BzgaBeratungsstellensucheEssstoerungen\\' => 'Classes']
    ],
    'autoload-dev' => [
        'psr-4' => ['Bzga\\BzgaBeratungsstellensucheEssstoerungen\\Tests\\' => 'Tests']
    ],
];
