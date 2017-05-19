<?php

namespace Flinks\BankingServices\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class AuthorizeRequestNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Flinks\\BankingServices\\Model\\AuthorizeRequest') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Flinks\BankingServices\Model\AuthorizeRequest) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['rootSchema'] ?: null);
        }
        $object = new \Flinks\BankingServices\Model\AuthorizeRequest();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (property_exists($data, 'LoginId')) {
            $object->setLoginId($data->{'LoginId'});
        }
        if (property_exists($data, 'Username')) {
            $object->setUsername($data->{'Username'});
        }
        if (property_exists($data, 'Password')) {
            $object->setPassword($data->{'Password'});
        }
        if (property_exists($data, 'Institution')) {
            $object->setInstitution($data->{'Institution'});
        }
        if (property_exists($data, 'RequestId')) {
            $object->setRequestId($data->{'RequestId'});
        }
        if (property_exists($data, 'Language')) {
            $object->setLanguage($data->{'Language'});
        }
        if (property_exists($data, 'SecurityResponses')) {
            $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'SecurityResponses'} as $key => $value) {
                $values_1 = array();
                foreach ($value as $value_1) {
                    $values_1[] = $value_1;
                }
                $values[$key] = $values_1;
            }
            $object->setSecurityResponses($values);
        }
        if (property_exists($data, 'Save')) {
            $object->setSave($data->{'Save'});
        }
        if (property_exists($data, 'ScheduleRefresh')) {
            $object->setScheduleRefresh($data->{'ScheduleRefresh'});
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
        if (null !== $object->getLoginId()) {
            $data->{'LoginId'} = $object->getLoginId();
        }
        if (null !== $object->getUsername()) {
            $data->{'Username'} = $object->getUsername();
        }
        if (null !== $object->getPassword()) {
            $data->{'Password'} = $object->getPassword();
        }
        if (null !== $object->getInstitution()) {
            $data->{'Institution'} = $object->getInstitution();
        }
        if (null !== $object->getRequestId()) {
            $data->{'RequestId'} = $object->getRequestId();
        }
        if (null !== $object->getLanguage()) {
            $data->{'Language'} = $object->getLanguage();
        }
        if (null !== $object->getSecurityResponses()) {
            $values = new \stdClass();
            foreach ($object->getSecurityResponses() as $key => $value) {
                $values_1 = array();
                foreach ($value as $value_1) {
                    $values_1[] = $value_1;
                }
                $values->{$key} = $values_1;
            }
            $data->{'SecurityResponses'} = $values;
        }
        if (null !== $object->getSave()) {
            $data->{'Save'} = $object->getSave();
        }
        if (null !== $object->getScheduleRefresh()) {
            $data->{'ScheduleRefresh'} = $object->getScheduleRefresh();
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