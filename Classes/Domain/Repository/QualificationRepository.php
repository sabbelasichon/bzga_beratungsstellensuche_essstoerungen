<?php

namespace Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository;

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
