<?php

namespace SebTM\INWX\DependencyInjection;

use SebTM\INWX\Exception\InvalidConfigurationException;
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
     * @throws \Exception                    Error occurred while parsing "services.yml"
     * @throws InvalidConfigurationException Missing environment-variable to construct a client-instance
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config/'));
        $loader->load('services.yml');

        $config = array(
            'environment' => \getenv('INWX_API_ENVIRONMENT'),
            'username' => \getenv('INWX_API_USERNAME'),
            'password' => \getenv('INWX_API_PASSWORD'),
            'language' => \getenv('INWX_API_LANGUAGE'),
            'debug' => \filter_var(\getenv('INWX_API_DEBUG'), FILTER_VALIDATE_BOOLEAN),
        );

        $validate = \array_search(false, $config, true);
        if (false !== $validate && 'debug' !== $validate) {
            throw new InvalidConfigurationException();
        }

        $definition = $container->getDefinition('inwx_api');
        $definition->replaceArgument(0, $config['environment']);
        $definition->replaceArgument(1, $config['username']);
        $definition->replaceArgument(2, $config['password']);
        $definition->replaceArgument(3, $config['language']);
        $definition->replaceArgument(4, $config['debug']);
    }
}
