<?php

namespace Flinks\BankingServices\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class ServerErrorResponseNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Flinks\\BankingServices\\Model\\ServerErrorResponse') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Flinks\BankingServices\Model\ServerErrorResponse) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['rootSchema'] ?: null);
        }
        $object = new \Flinks\BankingServices\Model\ServerErrorResponse();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (property_exists($data, 'FlinksCode')) {
            $object->setFlinksCode($data->{'FlinksCode'});
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
        if (null !== $object->getFlinksCode()) {
            $data->{'FlinksCode'} = $object->getFlinksCode();
        }
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