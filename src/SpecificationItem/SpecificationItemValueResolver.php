<?php

namespace DH\Artis\Product\Specification\SpecificationItem;

use Sylius\Component\Resource\Repository\RepositoryInterface;

/**
 * @todo This class does not use any interfaces or class typehints as at the very
 * moment they do not exist.
 * @todo Update by adding required types and typehints when Artis development is
 * in a state which allows that.
 */
class SpecificationItemValueResolver implements SpecificationItemValueResolverInterface
{
    public function getSpecificationItemValueFieldByType(SpecificationItemValueType $type, $value)
    {
        if ($type->equals(SpecificationItemValueType::INT())) {
            return 'intValue';
        } elseif ($type->equals(SpecificationItemValueType::BOOLEAN())) {
            return 'booleanValue';
        } elseif ($type->equals(SpecificationItemValueType::STRING())) {
            return 'value';
        } elseif (
            $type->equals(SpecificationItemValueType::SELECT()) ||
            $type->equals(SpecificationItemValueType::SELECT_WITH_IMAGE())) {

            return 'specificationItemValue';
        }

        return null;
    }

    public function getSpecificationItemValueByType(SpecificationItemValueType $type, $value, bool $getItemIdForSelect = false)
    {
        if ($type->equals(SpecificationItemValueType::INT())) {
            return $value->getIntValue();
        } elseif ($type->equals(SpecificationItemValueType::BOOLEAN())) {
            return $value->isBooleanValue();
        } elseif ($type->equals(SpecificationItemValueType::STRING())) {
            return $value->getValue();
        } elseif (
            $type->equals(SpecificationItemValueType::SELECT()) ||
            $type->equals(SpecificationItemValueType::SELECT_WITH_IMAGE())) {

           // /** @var ProductVariantSpecificationItemValueInterface $itemValue */
           // $itemValue = $this->productVariantSpecificationItemValueRepository->findOneBy(['code' => $value->getValue()]);

            if ($getItemIdForSelect) {
                return $value->getSpecificationItemValue()->getId();
            }

            return $value->getSpecificationItemValue()->getValue();
        }

        return null;
    }
}
