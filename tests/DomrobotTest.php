<?php

namespace SebTM\INWX\Tests;

use PHPUnit\Framework\TestCase;
use SebTM\INWX\Domrobot;
use SebTM\INWX\Exception\LoginUnsuccessfulException;

/**
 * @covers \SebTM\INWX\Domrobot
 */
class DomrobotTest extends TestCase
{
    /**
     * @covers \SebTM\INWX\Domrobot::__construct
     * @covers \SebTM\INWX\Domrobot::getDebug
     */
    public function testDebugDefault(): void
    {
        $domrobot = new Domrobot('test', 'test');

        $this->assertFalse($domrobot->getDebug());
    }

    /**
     * @covers \SebTM\INWX\Domrobot::__construct
     * @covers \SebTM\INWX\Domrobot::getDebug
     */
    public function testDebugFalse(): void
    {
        $domrobot = new Domrobot('test', 'test', array('debug' => false));

        $this->assertFalse($domrobot->getDebug());
    }

    /**
     * @covers \SebTM\INWX\Domrobot::__construct
     * @covers \SebTM\INWX\Domrobot::getDebug
     * @covers \SebTM\INWX\Domrobot::setDebug
     */
    public function testDebugTrue(): void
    {
        $domrobot = new Domrobot('test', 'test', array('debug' => true));

        $this->assertTrue($domrobot->getDebug());
    }

    /**
     * @covers \SebTM\INWX\Domrobot::__construct
     * @covers \SebTM\INWX\Domrobot::isLive
     * @covers \SebTM\INWX\Domrobot::isOte
     */
    public function testEnvironmentDefault(): void
    {
        $domrobot = new Domrobot('test', 'test');

        $this->assertFalse($domrobot->isLive());
        $this->assertTrue($domrobot->isOte());
    }

    /**
     * @covers \SebTM\INWX\Domrobot::__construct
     * @covers \SebTM\INWX\Domrobot::isLive
     * @covers \SebTM\INWX\Domrobot::isOte
     */
    public function testEnvironmentDevelopment(): void
    {
        $domrobot = new Domrobot('test', 'test', array('environment' => 'development'));

        $this->assertFalse($domrobot->isLive());
        $this->assertTrue($domrobot->isOte());
    }

    /**
     * @covers \SebTM\INWX\Domrobot::__construct
     * @covers \SebTM\INWX\Domrobot::isLive
     * @covers \SebTM\INWX\Domrobot::useLive
     */
    public function testEnvironmentProduction(): void
    {
        $domrobot = new Domrobot('test', 'test', array('environment' => 'production'));

        $this->assertTrue($domrobot->isLive());
        $this->assertFalse($domrobot->isOte());
    }

    /**
     * @covers \SebTM\INWX\Domrobot::__construct
     * @covers \SebTM\INWX\Domrobot::isJson
     * @covers \SebTM\INWX\Domrobot::isXml
     */
    public function testJsonDefault(): void
    {
        $domrobot = new Domrobot('test', 'test');

        $this->assertTrue($domrobot->isJson());
        $this->assertFalse($domrobot->isXml());
    }

    /**
     * @covers \SebTM\INWX\Domrobot::__construct
     * @covers \SebTM\INWX\Domrobot::isJson
     * @covers \SebTM\INWX\Domrobot::isXml
     * @covers \SebTM\INWX\Domrobot::useXml
     */
    public function testJsonFalse(): void
    {
        $domrobot = new Domrobot('test', 'test', array('json' => false));

        $this->assertFalse($domrobot->isJson());
        $this->assertTrue($domrobot->isXml());
    }

    /**
     * @covers \SebTM\INWX\Domrobot::__construct
     * @covers \SebTM\INWX\Domrobot::isJson
     * @covers \SebTM\INWX\Domrobot::isXml
     */
    public function testJsonTrue(): void
    {
        $domrobot = new Domrobot('test', 'test', array('json' => true));

        $this->assertTrue($domrobot->isJson());
        $this->assertFalse($domrobot->isXml());
    }

    /**
     * @covers \SebTM\INWX\Domrobot::__construct
     * @covers \SebTM\INWX\Domrobot::getLanguage
     */
    public function testLanguageDefault(): void
    {
        $expectedLanguage = 'en';
        $domrobot = new Domrobot('test', 'test');

        $this->assertSame($expectedLanguage, $domrobot->getLanguage());
    }

    /**
     * @covers \SebTM\INWX\Domrobot::__construct
     * @covers \SebTM\INWX\Domrobot::getLanguage
     * @covers \SebTM\INWX\Domrobot::setLanguage
     */
    public function testLanguageNotDefault(): void
    {
        $expectedLanguage = 'de';
        $domrobot = new Domrobot('test', 'test', array('language' => $expectedLanguage));

        $this->assertSame($expectedLanguage, $domrobot->getLanguage());
    }

    /**
     * @covers \SebTM\INWX\Domrobot::loginWrapper()
     *
     * @throws LoginUnsuccessfulException
     */
    public function testLoginUnsuccessful(): void
    {
        $this->expectException(LoginUnsuccessfulException::class);

        $domrobot = new Domrobot('test', 'test');
        $domrobot->loginWrapper();
    }

    /**
     * @covers \SebTM\INWX\Domrobot::loginWrapper()
     *
     * @throws LoginUnsuccessfulException
     */
    public function testLoginSuccessful(): void
    {
        $username = \getenv('INWX_API_USERNAME');
        $password = \getenv('INWX_API_PASSWORD');

        if (false === $username || false === $password) {
            $this->markTestSkipped('Secret variables for successful login-test not available!');
        }

        $result = (new Domrobot($username, $password))->loginWrapper();

        $this->assertTrue($result);
    }
}
