<?php

namespace Flinks\BankingServices\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class AccountTransactionNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Flinks\\BankingServices\\Model\\AccountTransaction') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Flinks\BankingServices\Model\AccountTransaction) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['rootSchema'] ?: null);
        }
        $object = new \Flinks\BankingServices\Model\AccountTransaction();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (property_exists($data, 'Date')) {
            $object->setDate($data->{'Date'});
        }
        if (property_exists($data, 'Code')) {
            $object->setCode($data->{'Code'});
        }
        if (property_exists($data, 'Description')) {
            $object->setDescription($data->{'Description'});
        }
        if (property_exists($data, 'Debit')) {
            $object->setDebit($data->{'Debit'});
        }
        if (property_exists($data, 'Credit')) {
            $object->setCredit($data->{'Credit'});
        }
        if (property_exists($data, 'Balance')) {
            $object->setBalance($data->{'Balance'});
        }
        if (property_exists($data, 'Id')) {
            $object->setId($data->{'Id'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getDate()) {
            $data->{'Date'} = $object->getDate();
        }
        if (null !== $object->getCode()) {
            $data->{'Code'} = $object->getCode();
        }
        if (null !== $object->getDescription()) {
            $data->{'Description'} = $object->getDescription();
        }
        if (null !== $object->getDebit()) {
            $data->{'Debit'} = $object->getDebit();
        }
        if (null !== $object->getCredit()) {
            $data->{'Credit'} = $object->getCredit();
        }
        if (null !== $object->getBalance()) {
            $data->{'Balance'} = $object->getBalance();
        }
        if (null !== $object->getId()) {
            $data->{'Id'} = $object->getId();
        }
        return $data;
    }
}