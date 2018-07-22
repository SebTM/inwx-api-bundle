<?php

namespace SebTM\INWX\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('inwx_api');

        $rootNode
            ->children()
            ->scalarNode('environment')->defaultValue('test')->end()
            ->scalarNode('username')->isRequired()->end()
            ->scalarNode('password')->isRequired()->end()
            ->scalarNode('language')->defaultValue('en')->end()
            ->booleanNode('debug')->defaultFalse()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
