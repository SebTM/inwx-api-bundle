<?php

namespace SebTM\INWX\Exception;

class InvalidConfigurationException extends \Exception
{
    /**
     * @var string
     */
    protected $message = 'Missing one or more environment-variable(s) for "sebtm/inwx-api-bundle"!';
}
