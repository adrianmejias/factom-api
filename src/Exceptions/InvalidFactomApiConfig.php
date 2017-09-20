<?php

namespace AdrianMejias\FactomApi\Exceptions;

use Exception;

class InvalidFactomApiConfig extends Exception
{
    /**
     * @return static
     */
    public static function noUrlDefined()
    {
        return new static('The Factom API requires a url to connect to');
    }
}
