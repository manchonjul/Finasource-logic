<?php

namespace Flinks\BankingServices\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class ExceptionNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Flinks\\BankingServices\\Model\\Exception') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Flinks\BankingServices\Model\Exception) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['rootSchema'] ?: null);
        }
        $object = new \Flinks\BankingServices\Model\Exception();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (property_exists($data, 'Message')) {
            $object->setMessage($data->{'Message'});
        }
        if (property_exists($data, 'InnerException')) {
            $object->setInnerException($this->serializer->deserialize($data->{'InnerException'}, 'Flinks\\BankingServices\\Model\\Exception', 'raw', $context));
        }
        if (property_exists($data, 'StackTrace')) {
            $object->setStackTrace($data->{'StackTrace'});
        }
        if (property_exists($data, 'Source')) {
            $object->setSource($data->{'Source'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getMessage()) {
            $data->{'Message'} = $object->getMessage();
        }
        if (null !== $object->getInnerException()) {
            $data->{'InnerException'} = $this->serializer->serialize($object->getInnerException(), 'raw', $context);
        }
        if (null !== $object->getStackTrace()) {
            $data->{'StackTrace'} = $object->getStackTrace();
        }
        if (null !== $object->getSource()) {
            $data->{'Source'} = $object->getSource();
        }
        return $data;
    }
}