<?php

namespace SebTM\INWX\Tests\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use SebTM\INWX\DependencyInjection\InwxApiExtension;
use SebTM\INWX\Domrobot;

/**
 * @covers \SebTM\INWX\DependencyInjection\InwxApiExtension
 */
class InwxApiExtensionTest extends AbstractExtensionTestCase
{
    /**
     * @covers \SebTM\INWX\DependencyInjection\InwxApiExtension::load()
     */
    public function testExtensionLoad(): void
    {
        $this->assertContainerBuilderNotHasService('inwx_api');

        $this->load();

        $this->assertContainerBuilderHasService('inwx_api', Domrobot::class);
        $this->assertContainerBuilderHasParameter('inwx_api');
    }

    /**
     * @return array|\Symfony\Component\DependencyInjection\Extension\ExtensionInterface[]
     */
    protected function getContainerExtensions(): array
    {
        return array(
            new InwxApiExtension(),
        );
    }

    /**
     * @return array
     */
    protected function getMinimalConfiguration(): array
    {
        return array(
            'username' => 'test',
            'password' => 'test',
        );
    }
}
