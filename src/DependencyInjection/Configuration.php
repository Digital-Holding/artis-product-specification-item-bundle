<?php

declare(strict_types=1);

namespace DH\Artis\Product\Specification\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('artis_product_specification_item');
        return $treeBuilder;
    }
}
