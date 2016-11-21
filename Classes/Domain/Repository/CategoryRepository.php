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
 * @package TYPO3
 * @subpackage bzga_beratungsstellensuche_essstoerungen
 * @author Sebastian Schreiber
 */
class CategoryRepository extends AbstractBaseRepository
{

    /**
     * @var string
     */
    const TABLE = 'tx_bzgaberatungsstellensuche_domain_model_category_extended';

    /**
     * @var string
     */
    const MM_TABLE = 'tx_bzgaberatungsstellensuche_entry_category_extended_mm';


}