<?php

namespace Flinks\BankingServices\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class LoginNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Flinks\\BankingServices\\Model\\Login') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Flinks\BankingServices\Model\Login) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['rootSchema'] ?: null);
        }
        $object = new \Flinks\BankingServices\Model\Login();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (property_exists($data, 'Username')) {
            $object->setUsername($data->{'Username'});
        }
        if (property_exists($data, 'IsScheduledRefresh')) {
            $object->setIsScheduledRefresh($data->{'IsScheduledRefresh'});
        }
        if (property_exists($data, 'LastRefresh') && !empty($data->{'LastRefresh'})) {
            $object->setLastRefresh((new \DateTime())->setTimestamp(strtotime($data->{'LastRefresh'})));
        }
        if (property_exists($data, 'Id')) {
            $object->setId($data->{'Id'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getUsername()) {
            $data->{'Username'} = $object->getUsername();
        }
        if (null !== $object->getIsScheduledRefresh()) {
            $data->{'IsScheduledRefresh'} = $object->getIsScheduledRefresh();
        }
        if (null !== $object->getLastRefresh()) {
            $data->{'LastRefresh'} = $object->getLastRefresh()->format("Y-m-d\TH:i:sP");
        }
        if (null !== $object->getId()) {
            $data->{'Id'} = $object->getId();
        }
        return $data;
    }
}