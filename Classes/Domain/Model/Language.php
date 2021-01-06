<?php

/*
 * This file is part of the "bzga_beratungsstellensuche_essstoerungen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Bzga\BzgaBeratungsstellensucheEssstoerungen\Domain\Model;

use Bzga\BzgaBeratungsstellensuche\Domain\Model\ExternalIdInterface;
use SJBR\StaticInfoTables\Domain\Model\AbstractEntity;

/**
 * @author Sebastian Schreiber
 */
class Language extends AbstractEntity implements ExternalIdInterface
{
    use \Bzga\BzgaBeratungsstellensuche\Domain\Model\ExternalIdTrait;
}
