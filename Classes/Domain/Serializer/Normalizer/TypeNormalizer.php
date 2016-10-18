<?php


namespace BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Serializer\Normalizer;

use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Type;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Serializer\NameConverter\TypeNameConverter;
use BZgA\BzgaBeratungsstellensuche\Domain\Serializer\Normalizer\GetSetMethodNormalizer;

class TypeNormalizer extends GetSetMethodNormalizer
{

    /**
     * @param null|\Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactoryInterface $classMetadataFactory
     */
    public function __construct(ClassMetadataFactory $classMetadataFactory = null)
    {
        parent::__construct($classMetadataFactory, new TypeNameConverter());
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === Type::class;
    }

}