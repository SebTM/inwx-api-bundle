<?php

namespace SebTM\INWX\Tests;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class TestKernel extends Kernel
{
    /**
     * @return string
     */
    public function getCacheDir()
    {
        return __DIR__.'/var/cache/';
    }

    /**
     * @return string
     */
    public function getLogDir()
    {
        return __DIR__.'/var/logs/';
    }

    /**
     * @return array|\Symfony\Component\HttpKernel\Bundle\BundleInterface[]
     */
    public function registerBundles()
    {
        return array(
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \SebTM\INWX\InwxApiBundle(),
        );
    }

    /**
     * @param LoaderInterface $loader
     *
     * @throws \Exception
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/Resources/config/config.yml');
    }
}
