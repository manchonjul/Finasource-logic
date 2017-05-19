<?php

namespace Flinks\BankingServices\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class BalanceNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Flinks\\BankingServices\\Model\\Balance') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Flinks\BankingServices\Model\Balance) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['rootSchema'] ?: null);
        }
        $object = new \Flinks\BankingServices\Model\Balance();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (property_exists($data, 'Available')) {
            $object->setAvailable($data->{'Available'});
        }
        if (property_exists($data, 'Current')) {
            $object->setCurrent($data->{'Current'});
        }
        if (property_exists($data, 'Limit')) {
            $object->setLimit($data->{'Limit'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getAvailable()) {
            $data->{'Available'} = $object->getAvailable();
        }
        if (null !== $object->getCurrent()) {
            $data->{'Current'} = $object->getCurrent();
        }
        if (null !== $object->getLimit()) {
            $data->{'Limit'} = $object->getLimit();
        }
        return $data;
    }
}