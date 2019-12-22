<?php

namespace SebTM\INWX\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class InwxApiExtension extends Extension
{
    /**
     * @throws \Exception Error occurred while parsing "services.yml"
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('inwx_api', $config);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config/'));
        $loader->load('services.yml');

        $options = \array_filter($config, static function (string $key) {
            return 'username' !== $key && 'password' !== $key;
        }, ARRAY_FILTER_USE_KEY);

        $definition = $container->getDefinition('inwx_api');
        $definition->replaceArgument(0, $config['username']);
        $definition->replaceArgument(1, $config['password']);
        $definition->replaceArgument(2, $options);
    }
}
