<?php

namespace SebTM\INWX;

use INWX\Domrobot as BaseDomrobot;

class Domrobot extends BaseDomrobot
{
    /**
     * @var string
     */
    protected $environment;

    /**
     * @param string $environment
     * @param string $username
     * @param string $password
     * @param string $language
     * @param bool   $debug
     *
     * @throws \Exception
     */
    public function __construct($environment, $username, $password, $language = 'en', $debug = false)
    {
        $this->environment = $environment;
        parent::__construct($this->getAddress($environment));

        $this->setLanguage($language);
        $this->setDebug($debug);
        $this->login($username, $password);
    }

    /**
     * @return string
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param string $environment
     *
     * @throws \Exception Unsupported environment
     *
     * @return string
     */
    protected function getAddress($environment)
    {
        switch ($environment) {
            case 'production':
                return ' https://api.domrobot.com/xmlrpc/';

            case 'test':
                return 'https://api.ote.domrobot.com/xmlrpc/';

            default:
                throw new \Exception('Unsupported environment!');
        }
    }
}
