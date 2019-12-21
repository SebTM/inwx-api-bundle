<?php

namespace SebTM\INWX;

use INWX\Domrobot as BaseDomrobot;
use SebTM\INWX\Exception\LoginUnsuccessfulException;

class Domrobot extends BaseDomrobot
{
    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    public function __construct(string $username, string $password, array $options = array())
    {
        parent::__construct();

        $this->username = $username;
        $this->password = $password;

        if (\array_key_exists('debug', $options) && true === $options['debug']) {
            $this->setDebug(true);
        }

        if (\array_key_exists('environment', $options) && 'production' === $options['environment']) {
            $this->useLive();
        }

        if (\array_key_exists('json', $options) && false === $options['json']) {
            $this->useXml();
        }

        if (\array_key_exists('language', $options)) {
            $this->setLanguage($options['language']);
        }
    }

    /**
     * @throws LoginUnsuccessfulException
     */
    public function loginWrapper(): bool
    {
        $result = $this->login($this->username, $this->password);

        if (1000 === $result['code']) {
            return true;
        }

        throw new LoginUnsuccessfulException();
    }
}
