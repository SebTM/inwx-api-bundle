<?php

namespace SebTM\INWX;

use INWX\Domrobot as BaseDomrobot;
use SebTM\INWX\Exception\LoginUnsuccessfulException;
use SebTM\INWX\Exception\UnsupportedEnvironmentException;

class Domrobot extends BaseDomrobot
{
    /**
     * @var string
     */
    protected $environment;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @param string $environment
     * @param string $username
     * @param string $password
     * @param string $language
     * @param bool   $debug
     *
     * @throws UnsupportedEnvironmentException
     */
    public function __construct($environment, $username, $password, $language = 'en', $debug = false)
    {
        $this->environment = $environment;
        $this->username = $username;
        $this->password = $password;

        parent::__construct($this->getApiUrl());

        $this->setLanguage($language);
        $this->setDebug($debug);
    }

    /**
     * @throws UnsupportedEnvironmentException
     *
     * @return string
     */
    public function getApiUrl(): string
    {
        switch ($this->environment) {
            case 'production':
                return 'https://api.domrobot.com/xmlrpc/';

            case 'test':
                return 'https://api.ote.domrobot.com/xmlrpc/';

            default:
                throw new UnsupportedEnvironmentException();
        }
    }

    /**
     * @return string
     */
    public function getEnvironment(): string
    {
        return $this->environment;
    }

    /**
     * @param null|string $username     Should not be set to use values from DI - must have method signature compatible
     * @param null|string $password     Should not be set to use values from DI - must have method signature compatible
     * @param null|string $sharedSecret
     *
     * @throws LoginUnsuccessfulException
     *
     * @return bool
     */
    public function login($username = null, $password = null, $sharedSecret = null): bool
    {
        if (null === $username && null === $password) {
            $username = $this->username;
            $password = $this->password;
        }

        $result = parent::login($username, $password, $sharedSecret);

        if (1000 === $result['code']) {
            return true;
        }

        throw new LoginUnsuccessfulException();
    }
}
