<?php

namespace DH\Artis\Product\Specification\SpecificationItem;

use MyCLabs\Enum\Enum;

class SpecificationItemValueType extends Enum
{
    private const
        INT = 'INT',
        BOOLEAN = 'BOOLEAN',
        STRING = 'STRING',
        SELECT = 'SELECT',
        SELECT_WITH_IMAGE = 'SELECT + IMAGE';
}
