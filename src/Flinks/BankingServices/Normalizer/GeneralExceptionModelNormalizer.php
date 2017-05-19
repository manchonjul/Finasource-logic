<?php

namespace Flinks\BankingServices\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class GeneralExceptionModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Flinks\\BankingServices\\Model\\GeneralExceptionModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Flinks\BankingServices\Model\GeneralExceptionModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['rootSchema'] ?: null);
        }
        $object = new \Flinks\BankingServices\Model\GeneralExceptionModel();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (property_exists($data, 'HttpCode')) {
            $object->setHttpCode($data->{'HttpCode'});
        }
        if (property_exists($data, 'FlinksCode')) {
            $object->setFlinksCode($data->{'FlinksCode'});
        }
        if (property_exists($data, 'Name')) {
            $object->setName($data->{'Name'});
        }
        if (property_exists($data, 'Message')) {
            $object->setMessage($data->{'Message'});
        }
        if (property_exists($data, 'Exception')) {
            $object->setException($this->serializer->deserialize($data->{'Exception'}, 'Flinks\\BankingServices\\Model\\Exception', 'raw', $context));
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getHttpCode()) {
            $data->{'HttpCode'} = $object->getHttpCode();
        }
        if (null !== $object->getFlinksCode()) {
            $data->{'FlinksCode'} = $object->getFlinksCode();
        }
        if (null !== $object->getName()) {
            $data->{'Name'} = $object->getName();
        }
        if (null !== $object->getMessage()) {
            $data->{'Message'} = $object->getMessage();
        }
        if (null !== $object->getException()) {
            $data->{'Exception'} = $this->serializer->serialize($object->getException(), 'raw', $context);
        }
        return $data;
    }
}