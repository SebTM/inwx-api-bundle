<?php

namespace SebTM\INWX\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('inwx_api');

        $rootNode
            ->children()
            ->booleanNode('debug')
            ->defaultFalse()
            ->end()
            ->enumNode('environment')
            ->values(
                        array(
                            'production',
                            'development',
                        )
                    )
            ->defaultValue('development')
            ->end()
            ->booleanNode('json')
            ->defaultTrue()
            ->end()
            ->scalarNode('language')
            ->defaultValue('en')
            ->end()
            ->scalarNode('username')
            ->isRequired()
            ->end()
            ->scalarNode('password')
            ->isRequired()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
