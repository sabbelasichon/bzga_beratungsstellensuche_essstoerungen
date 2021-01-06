<?php

/*
 * This file is part of the "bzga_beratungsstellensuche_essstoerungen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository;

use Bzga\BzgaBeratungsstellensuche\Domain\Repository\AbstractBaseRepository;

/**
 * @author Sebastian Schreiber
 */
class QualificationRepository extends AbstractBaseRepository
{
    /**
     * @var string
     */
    public const TABLE = 'tx_bzgaberatungsstellensuche_domain_model_qualification';

    /**
     * @var string
     */
    public const MM_TABLE = 'tx_bzgaberatungsstellensuche_entry_qualification_mm';
}
