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
    /** @var ProductVariantSpecificationItemValueRepositoryInterface */
    private $productVariantSpecificationItemValueRepository;

    public function __construct(RepositoryInterface $productVariantSpecificationItemValueRepository)
    {
        $this->productVariantSpecificationItemValueRepository = $productVariantSpecificationItemValueRepository;
    }

    public function getSpecificationItemValueFieldByType(string $type, $value)
    {
        if (SpecificationItemValueType::INT() === $type) {
            return 'intValue';
        } elseif (SpecificationItemValueType::BOOLEAN() === $type) {
            return 'booleanValue';
        } elseif (SpecificationItemValueType::STRING() === $type) {
            return 'value';
        } elseif (
            SpecificationItemValueType::SELECT() === $type ||
            SpecificationItemValueType::SELECT_WITH_IMAGE() === $type) {

            return 'specificationItemValue';
        }

        return null;
    }

    public function getSpecificationItemValueByType(string $type, $value, bool $getItemIdForSelect = false)
    {
        if (SpecificationItemValueType::INT() === $type) {
            return $value->getIntValue();
        } elseif (SpecificationItemValueType::BOOLEAN() === $type) {
            return $value->isBooleanValue();
        } elseif (SpecificationItemValueType::STRING() === $type) {
            return $value->getValue();
        } elseif (
            SpecificationItemValueType::SELECT() === $type ||
            SpecificationItemValueType::SELECT_WITH_IMAGE() === $type) {
            /** @var ProductVariantSpecificationItemValueInterface $itemValue */
            $itemValue = $this->productVariantSpecificationItemValueRepository->findOneBy(['code' => $value->getValue()]);

            if ($getItemIdForSelect) {
                return $itemValue->getId();
            }

            return $itemValue->getValue();
        }

        return null;
    }
}
