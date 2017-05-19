<?php

namespace Flinks\BankingServices\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class LinkNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Flinks\\BankingServices\\Model\\Link') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Flinks\BankingServices\Model\Link) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['rootSchema'] ?: null);
        }
        $object = new \Flinks\BankingServices\Model\Link();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (property_exists($data, 'rel')) {
            $object->setRel($data->{'rel'});
        }
        if (property_exists($data, 'href')) {
            $object->setHref($data->{'href'});
        }
        if (property_exists($data, 'example')) {
            $object->setExample($data->{'example'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getRel()) {
            $data->{'rel'} = $object->getRel();
        }
        if (null !== $object->getHref()) {
            $data->{'href'} = $object->getHref();
        }
        if (null !== $object->getExample()) {
            $data->{'example'} = $object->getExample();
        }
        return $data;
    }
}