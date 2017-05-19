<?php

namespace Flinks\BankingServices\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class AccountsDetailResponseNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Flinks\\BankingServices\\Model\\AccountsDetailResponse') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Flinks\BankingServices\Model\AccountsDetailResponse) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['rootSchema'] ?: null);
        }
        $object = new \Flinks\BankingServices\Model\AccountsDetailResponse();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (property_exists($data, 'HttpStatusCode')) {
            $object->setHttpStatusCode($data->{'HttpStatusCode'});
        }
        if (property_exists($data, 'Accounts')) {
            $values = array();
            foreach ($data->{'Accounts'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'Flinks\\BankingServices\\Model\\AccountWithDetails', 'raw', $context);
            }
            $object->setAccounts($values);
        }
        if (property_exists($data, 'Login')) {
            $object->setLogin($this->serializer->deserialize($data->{'Login'}, 'Flinks\\BankingServices\\Model\\Login', 'raw', $context));
        }
        if (property_exists($data, 'Institution')) {
            $object->setInstitution($data->{'Institution'});
        }
        if (property_exists($data, 'RequestId')) {
            $object->setRequestId($data->{'RequestId'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getHttpStatusCode()) {
            $data->{'HttpStatusCode'} = $object->getHttpStatusCode();
        }
        if (null !== $object->getAccounts()) {
            $values = array();
            foreach ($object->getAccounts() as $value) {
                $values[] = $this->serializer->serialize($value, 'raw', $context);
            }
            $data->{'Accounts'} = $values;
        }
        if (null !== $object->getLogin()) {
            $data->{'Login'} = $this->serializer->serialize($object->getLogin(), 'raw', $context);
        }
        if (null !== $object->getInstitution()) {
            $data->{'Institution'} = $object->getInstitution();
        }
        if (null !== $object->getRequestId()) {
            $data->{'RequestId'} = $object->getRequestId();
        }
        return $data;
    }
}