<?php


namespace BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model;

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

use SJBR\StaticInfoTables\Domain\Model\AbstractEntity;
use BZgA\BzgaBeratungsstellensuche\Domain\Model\ExternalIdInterface;

/**
 * @package TYPO3
 * @subpackage bzga_beratungsstellensuche_essstoerungen
 * @author Sebastian Schreiber
 */
class Language extends AbstractEntity implements ExternalIdInterface
{

    use \BZgA\BzgaBeratungsstellensuche\Domain\Model\ExternalIdTrait;

}