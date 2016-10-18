<?php


namespace BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Serializer\Normalizer;

use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Model\Category;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Serializer\NameConverter\CategoryNameConverter;
use BZgA\BzgaBeratungsstellensuche\Domain\Serializer\Normalizer\GetSetMethodNormalizer;

class CategoryNormalizer extends GetSetMethodNormalizer
{

    /**
     * @param null|\Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactoryInterface $classMetadataFactory
     */
    public function __construct(ClassMetadataFactory $classMetadataFactory = null)
    {
        parent::__construct($classMetadataFactory, new CategoryNameConverter());
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === Category::class;
    }

}