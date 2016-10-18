<?php


namespace BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Serializer\Normalizer;

use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Measure;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Serializer\NameConverter\MeasureNameConverter;
use BZgA\BzgaBeratungsstellensuche\Domain\Serializer\Normalizer\GetSetMethodNormalizer;

class MeasureNormalizer extends GetSetMethodNormalizer
{

    /**
     * @param null|\Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactoryInterface $classMetadataFactory
     */
    public function __construct(ClassMetadataFactory $classMetadataFactory = null)
    {
        parent::__construct($classMetadataFactory, new MeasureNameConverter());
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === Measure::class;
    }

}