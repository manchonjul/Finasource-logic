<?php

namespace Flinks\BankingServices\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class UnauthorizedResponseNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Flinks\\BankingServices\\Model\\UnauthorizedResponse') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Flinks\BankingServices\Model\UnauthorizedResponse) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['rootSchema'] ?: null);
        }
        $object = new \Flinks\BankingServices\Model\UnauthorizedResponse();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (property_exists($data, 'HttpStatusCode')) {
            $object->setHttpStatusCode($data->{'HttpStatusCode'});
        }
        if (property_exists($data, 'RequestId')) {
            $object->setRequestId($data->{'RequestId'});
        }
        if (property_exists($data, 'HttpStatusCode')) {
            $object->setHttpStatusCode($data->{'HttpStatusCode'});
        }
        if (property_exists($data, 'Institution')) {
            $object->setInstitution($data->{'Institution'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getHttpStatusCode()) {
            $data->{'HttpStatusCode'} = $object->getHttpStatusCode();
        }
        if (null !== $object->getRequestId()) {
            $data->{'RequestId'} = $object->getRequestId();
        }
        if (null !== $object->getHttpStatusCode()) {
            $data->{'HttpStatusCode'} = $object->getHttpStatusCode();
        }
        if (null !== $object->getInstitution()) {
            $data->{'Institution'} = $object->getInstitution();
        }
        return $data;
    }
}