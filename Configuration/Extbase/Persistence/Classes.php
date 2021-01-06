<?php

declare(strict_types=1);

/*
 * This file is part of the "bzga_beratungsstellensuche_essstoerungen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

return [
    \Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Targetgroup::class => [
        'tableName' => 'tx_bzgaberatungsstellensuche_domain_model_targetgroup',
    ],
    \Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Measure::class => [
        'tableName' => 'tx_bzgaberatungsstellensuche_domain_model_measure',
    ],
    \Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Expert::class => [
        'tableName' => 'tx_bzgaberatungsstellensuche_domain_model_expert',
    ],
    \Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Qualification::class => [
        'tableName' => 'tx_bzgaberatungsstellensuche_domain_model_qualification',
    ],
    \Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Type::class => [
        'tableName' => 'tx_bzgaberatungsstellensuche_domain_model_type',
    ],
    \Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Category::class => [
        'tableName' => 'tx_bzgaberatungsstellensuche_domain_model_category_extended',
    ],
];
