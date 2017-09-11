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
    'version' => '6.2.0',
    'constraints' => [
        'depends' => [
            'typo3' => '6.2.10-6.99.99',
            'bzga_beratungsstellensuche' => '6.2.0-6.99.99',
        ],
        'conflicts' => [],
    ],
    'autoload' => [
        'classmap' => ['Classes']
    ],
    'autoload-dev' => [
        'classmap' => ['Tests']
    ],
];
