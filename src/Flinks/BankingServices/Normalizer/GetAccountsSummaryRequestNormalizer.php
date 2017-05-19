<?php

namespace Flinks\BankingServices\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class GetAccountsSummaryRequestNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Flinks\\BankingServices\\Model\\GetAccountsSummaryRequest') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Flinks\BankingServices\Model\GetAccountsSummaryRequest) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['rootSchema'] ?: null);
        }
        $object = new \Flinks\BankingServices\Model\GetAccountsSummaryRequest();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (property_exists($data, 'RequestId')) {
            $object->setRequestId($data->{'RequestId'});
        }
        if (property_exists($data, 'MostRecent')) {
            $object->setMostRecent($data->{'MostRecent'});
        }
        if (property_exists($data, 'CustomerId')) {
            $object->setCustomerId($data->{'CustomerId'});
        }
        if (property_exists($data, 'Provider')) {
            $object->setProvider($data->{'Provider'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getRequestId()) {
            $data->{'RequestId'} = $object->getRequestId();
        }
        if (null !== $object->getMostRecent()) {
            $data->{'MostRecent'} = $object->getMostRecent();
        }
        if (null !== $object->getCustomerId()) {
            $data->{'CustomerId'} = $object->getCustomerId();
        }
        if (null !== $object->getProvider()) {
            $data->{'Provider'} = $object->getProvider();
        }
        return $data;
    }
}