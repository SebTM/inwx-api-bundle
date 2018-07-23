<?php

namespace SebTM\INWX\Exception;

class LoginUnsuccessfulException extends \Exception
{
    /**
     * @var string
     */
    protected $message = 'Login using "inwx-api-bundle" was unsuccessful!';
}
