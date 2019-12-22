<?php

namespace SebTM\INWX\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    protected const ROOT_NODE = 'inwx_api';

    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder(self::ROOT_NODE);

        $root = method_exists($treeBuilder, 'getRootNode') ?
            $treeBuilder->getRootNode() :
            $treeBuilder->root(self::ROOT_NODE);

        $root
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
