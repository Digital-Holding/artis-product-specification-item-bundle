<?php

namespace DH\Artis\Product\Specification\SpecificationItem;

/**
 * @todo This class does not use any interfaces or class typehints as at the very
 * moment they do not exist.
 * @todo Update by adding required types and typehints when Artis development is
 * in a state which allows that.
 */
interface SpecificationItemValueResolverInterface
{
    public function getSpecificationItemValueByType(string $type, $value, bool $getItemIdForSelect = false);
    public function getSpecificationItemValueFieldByType(string $type, $value);
}
