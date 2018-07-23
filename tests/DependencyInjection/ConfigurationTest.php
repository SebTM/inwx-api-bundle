<?php

namespace SebTM\INWX\Tests\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionConfigurationTestCase;
use SebTM\INWX\DependencyInjection\Configuration;
use SebTM\INWX\DependencyInjection\InwxApiExtension;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

/**
 * @covers \SebTM\INWX\DependencyInjection\Configuration
 */
class ConfigurationTest extends AbstractExtensionConfigurationTestCase
{
    /**
     * @covers \SebTM\INWX\DependencyInjection\Configuration::getConfigTreeBuilder()
     */
    public function testConfiguration(): void
    {
        $expectedConfiguration = array(
            'environment' => 'test',
            'username' => 'test',
            'password' => 'test',
            'language' => 'en',
            'debug' => true,
        );

        $this->assertProcessedConfigurationEquals(
            $expectedConfiguration,
            array(
                __DIR__.'/fixtures/config.yml',
            )
        );
    }

    /**
     * @return Configuration|\Symfony\Component\Config\Definition\ConfigurationInterface
     */
    protected function getConfiguration(): ConfigurationInterface
    {
        return new Configuration();
    }

    /**
     * @return InwxApiExtension|\Symfony\Component\DependencyInjection\Extension\ExtensionInterface
     */
    protected function getContainerExtension(): ExtensionInterface
    {
        return new InwxApiExtension();
    }
}
