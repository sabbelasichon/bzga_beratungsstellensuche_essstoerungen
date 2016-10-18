<?php


namespace BZgA\BzgaBeratungsstellensucheEssstoerungen\Slots;

use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Serializer\Normalizer\TargetgroupNormalizer;
use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Serializer\Normalizer\MeasureNormalizer;
use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Serializer\Normalizer\QualificationNormalizer;
use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Serializer\Normalizer\ExpertNormalizer;
use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Serializer\Normalizer\TypeNormalizer;
use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Serializer\Normalizer\CategoryNormalizer;

class Serializer
{

    /**
     * @param array $normalizers
     * @return array
     */
    public function additionalNormalizers(array $normalizers = array())
    {
        $normalizers = array_merge($normalizers, array(
            new TargetgroupNormalizer(),
            new MeasureNormalizer(),
            new QualificationNormalizer(),
            new ExpertNormalizer(),
            new TypeNormalizer(),
            new CategoryNormalizer(),
        ));

        return array('extendedNormalizers' => $normalizers);
    }

}