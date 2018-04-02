<?php

namespace SebTM\INWX\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AbstractKernelTest extends TestCase
{
    /**
     * @var TestKernel
     */
    protected $kernel;
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function setUp()
    {
        $this->kernel = new TestKernel('test', true);
        $this->kernel->boot();

        $this->container = $this->kernel->getContainer();
    }
}
