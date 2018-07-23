<?php

namespace SebTM\INWX\Tests;

use PHPUnit\Framework\TestCase;
use SebTM\INWX\Domrobot;
use SebTM\INWX\Exception\LoginUnsuccessfulException;
use SebTM\INWX\Exception\UnsupportedEnvironmentException;

/**
 * @covers \SebTM\INWX\Domrobot
 */
class DomrobotTest extends TestCase
{
    /**
     * @covers \SebTM\INWX\Domrobot::getApiUrl()
     *
     * @throws UnsupportedEnvironmentException
     */
    public function testGetApiUrlProduction(): void
    {
        $domrobot = new Domrobot('production', 'test', 'test');

        $this->assertSame(
            'https://api.domrobot.com/xmlrpc/',
            $domrobot->getApiUrl()
        );
    }

    /**
     * @covers \SebTM\INWX\Domrobot::__construct()
     * @covers \SebTM\INWX\Domrobot::getApiUrl()
     * @covers \SebTM\INWX\Domrobot::getDebug()
     * @covers \SebTM\INWX\Domrobot::getEnvironment()
     * @covers \SebTM\INWX\Domrobot::getLanguage()
     * @covers \SebTM\INWX\Domrobot::setDebug()
     * @covers \SebTM\INWX\Domrobot::setLanguage()
     *
     * @throws UnsupportedEnvironmentException
     */
    public function testInitialization(): void
    {
        $debug = true;
        $environment = 'test';
        $language = 'en';

        $domrobot = new Domrobot($environment, 'test', 'test', $language, $debug);

        $this->assertSame($debug, $domrobot->getDebug());
        $this->assertSame($environment, $domrobot->getEnvironment());
        $this->assertSame($language, $domrobot->getLanguage());
        $this->assertSame(
            'https://api.ote.domrobot.com/xmlrpc/',
            $domrobot->getApiUrl()
        );
    }

    /**
     * @covers \SebTM\INWX\Domrobot::login()
     *
     * @throws LoginUnsuccessfulException
     * @throws UnsupportedEnvironmentException
     */
    public function testLoginUnsuccessful(): void
    {
        $this->expectException(LoginUnsuccessfulException::class);

        $domrobot = new Domrobot('test', 'test', 'test');
        $domrobot->login();
    }

    /**
     * @covers \SebTM\INWX\Domrobot::login()
     *
     * @throws LoginUnsuccessfulException
     * @throws UnsupportedEnvironmentException
     */
    public function testLoginSuccessful(): void
    {
        $username = \getenv('INWX_API_USERNAME');
        $password = \getenv('INWX_API_PASSWORD');

        if (false === $username || false === $password) {
            $this->markTestSkipped('Secret variables for successful login-test not available!');
        }

        $domrobot = new Domrobot('test', $username, $password);
        $result = $domrobot->login();

        $this->assertTrue($result);
    }

    /**
     * @covers \SebTM\INWX\Domrobot::__construct()
     *
     * @throws UnsupportedEnvironmentException
     */
    public function testUnsupportedEnvironment(): void
    {
        $this->expectException(UnsupportedEnvironmentException::class);

        new Domrobot('unsupported', 'test', 'test');
    }
}
