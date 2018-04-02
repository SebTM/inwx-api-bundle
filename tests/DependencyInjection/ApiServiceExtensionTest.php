<?php

namespace SebTM\INWX\Tests\DependencyInjection;

use INWX\Domrobot;
use SebTM\INWX\Tests\AbstractKernelTest;

/**
 * @coversNothing
 */
class ApiServiceExtensionTest extends AbstractKernelTest
{
    public function testServiceInitialization()
    {
        /** @var Domrobot $client */
        $client = $this->container->get('inwx_api');

        $this->assertInstanceOf(\SebTM\INWX\Domrobot::class, $client);
    }
}
