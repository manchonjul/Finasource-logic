<?php

namespace Flinks\BankingServices\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class AccountNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Flinks\\BankingServices\\Model\\Account') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Flinks\BankingServices\Model\Account) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['rootSchema'] ?: null);
        }
        $object = new \Flinks\BankingServices\Model\Account();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (property_exists($data, 'Title')) {
            $object->setTitle($data->{'Title'});
        }
        if (property_exists($data, 'AccountNumber')) {
            $object->setAccountNumber($data->{'AccountNumber'});
        }
        if (property_exists($data, 'Balance')) {
            $object->setBalance($this->serializer->deserialize($data->{'Balance'}, 'Flinks\\BankingServices\\Model\\Balance', 'raw', $context));
        }
        if (property_exists($data, 'Category')) {
            $object->setCategory($data->{'Category'});
        }
        if (property_exists($data, 'Id')) {
            $object->setId($data->{'Id'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getTitle()) {
            $data->{'Title'} = $object->getTitle();
        }
        if (null !== $object->getAccountNumber()) {
            $data->{'AccountNumber'} = $object->getAccountNumber();
        }
        if (null !== $object->getBalance()) {
            $data->{'Balance'} = $this->serializer->serialize($object->getBalance(), 'raw', $context);
        }
        if (null !== $object->getCategory()) {
            $data->{'Category'} = $object->getCategory();
        }
        if (null !== $object->getId()) {
            $data->{'Id'} = $object->getId();
        }
        return $data;
    }
}