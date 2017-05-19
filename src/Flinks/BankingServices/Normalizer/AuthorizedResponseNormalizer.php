<?php

namespace Flinks\BankingServices\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class AuthorizedResponseNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Flinks\\BankingServices\\Model\\AuthorizedResponse') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Flinks\BankingServices\Model\AuthorizedResponse) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['rootSchema'] ?: null);
        }
        $object = new \Flinks\BankingServices\Model\AuthorizedResponse();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (property_exists($data, 'Login')) {
            $object->setLogin($this->serializer->deserialize($data->{'Login'}, 'Flinks\\BankingServices\\Model\\Login', 'raw', $context));
        }
        if (property_exists($data, 'Accounts')) {
            $values = array();
            foreach ($data->{'Accounts'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'Flinks\\BankingServices\\Model\\Account', 'raw', $context);
            }
            $object->setAccounts($values);
        }
        if (property_exists($data, 'TransactionCompleted')) {
            $object->setTransactionCompleted($data->{'TransactionCompleted'});
        }
        if (property_exists($data, 'RequestId')) {
            $object->setRequestId($data->{'RequestId'});
        }
        if (property_exists($data, 'HttpStatusCode')) {
            $object->setHttpStatusCode($data->{'HttpStatusCode'});
        }
        if (property_exists($data, 'Provider')) {
            $object->setProvider($data->{'Provider'});
        }
        if (property_exists($data, 'Exception')) {
            $object->setException($this->serializer->deserialize($data->{'Exception'}, 'Flinks\\BankingServices\\Model\\GeneralExceptionModel', 'raw', $context));
        }
        if (property_exists($data, 'Institution')) {
            $object->setInstitution($data->{'Institution'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getLogin()) {
            $data->{'Login'} = $this->serializer->serialize($object->getLogin(), 'raw', $context);
        }
        if (null !== $object->getAccounts()) {
            $values = array();
            foreach ($object->getAccounts() as $value) {
                $values[] = $this->serializer->serialize($value, 'raw', $context);
            }
            $data->{'Accounts'} = $values;
        }
        if (null !== $object->getTransactionCompleted()) {
            $data->{'TransactionCompleted'} = $object->getTransactionCompleted();
        }
        if (null !== $object->getRequestId()) {
            $data->{'RequestId'} = $object->getRequestId();
        }
        if (null !== $object->getHttpStatusCode()) {
            $data->{'HttpStatusCode'} = $object->getHttpStatusCode();
        }
        if (null !== $object->getProvider()) {
            $data->{'Provider'} = $object->getProvider();
        }
        if (null !== $object->getException()) {
            $data->{'Exception'} = $this->serializer->serialize($object->getException(), 'raw', $context);
        }
        if (null !== $object->getInstitution()) {
            $data->{'Institution'} = $object->getInstitution();
        }
        return $data;
    }
}