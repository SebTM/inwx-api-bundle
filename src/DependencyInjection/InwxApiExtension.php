<?php

namespace SebTM\INWX\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class InwxApiExtension extends Extension
{
    /**
     * @param array            $configs
     * @param ContainerBuilder $container
     *
     * @throws \Exception Error occurred while parsing "services.yml"
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('inwx_api', $config);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config/'));
        $loader->load('services.yml');

        $definition = $container->getDefinition('inwx_api');
        $definition->replaceArgument(0, $config['environment']);
        $definition->replaceArgument(1, $config['username']);
        $definition->replaceArgument(2, $config['password']);
        $definition->replaceArgument(3, $config['language']);
        $definition->replaceArgument(4, $config['debug']);
    }
}
