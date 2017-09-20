<?php

namespace AdrianMejias\FactomApi\Exceptions;

use Exception;

class InvalidFactomApiConfig extends Exception
{
    /**
     * @return static
     */
    public static function noCurlFound()
    {
        return new static('The Factom API integration requires the cURL extension, please see http://curl.haxx.se/docs/install.html to install it');
    }

    /**
     * @return static
     */
    public static function noUrlDefined()
    {
        return new static('The Factom API requires a url to connect to');
    }

    /**
     * @return static
     */
    public static function noCertificateDefined()
    {
        return new static('When enabling SSL configuration, you must ensure to define a certificate');
    }

    /**
     * @return static
     */
    public static function noSecureUrlDefined()
    {
        return new static('When defining a certificate, you must ensure the host is using HTTPS');
    }

    /**
     * @return static
     */
    public static function noCertificateExists()
    {
        return new static('Can\'t find provided certificate file');
    }
    
    /**
     * @return static
     */
    public static function noUsernameDefined()
    {
        return new static('You must provide a password with a username');
    }
    
    /**
     * @return static
     */
    public static function noPasswordDefined()
    {
        return new static('You must provide a username with a password');
    }
    
    /**
     * @return static
     */
    public static function invalidMethodCalled()
    {
        return new static('Supplied method must match GET or POST');
    }
    
    /**
     * @return static
     */
    public static function invalidApiResponse(string $error, string $actionName)
    {
        return new static('Received error "'.$error.'" when hitting "'.$actionName.'" within the Factom API');
    }
    
    /**
     * @return static
     */
    public static function emptyApiResponse(string $actionName)
    {
        return new static('Received an empty response when hitting "'.$actionName.'" within the Factom API');
    }
}
