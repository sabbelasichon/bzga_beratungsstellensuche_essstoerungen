<?php


namespace BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Serializer\Normalizer;

use BZgA\BzgaBeratungsstellensuche\Domain\Serializer\Normalizer\GetSetMethodNormalizer;
use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Expert;
use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Serializer\NameConverter\ExpertNameConverter;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;

class ExpertNormalizer extends GetSetMethodNormalizer
{

    /**
     * @param null|\Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactoryInterface $classMetadataFactory
     */
    public function __construct(ClassMetadataFactory $classMetadataFactory = null)
    {
        parent::__construct($classMetadataFactory, new ExpertNameConverter());
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === Expert::class;
    }

}