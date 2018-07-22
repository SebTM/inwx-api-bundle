<?php

namespace SebTM\INWX\Exception;

class UnsupportedEnvironmentException extends \Exception
{
    /**
     * @var string
     */
    protected $message = 'Unsupported environment given for "sebtm/inwx-api-bundle"!';
}
