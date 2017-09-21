<?php

namespace AdrianMejias\FactomApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use AdrianMejias\FactomApi\Exceptions\InvalidFactomApiConfig;

class FactomConnector
{
    /**
     * The JSON RPC spec that the API uses.
     *
     * @var string
     */
    const JSON_RPC = '2.0';

    /**
     * The "ID" param provided in all requests to the API.
     *
     * @var int
     */
    const REQUEST_ID = 0;

    /**
     * The header content type in all requests to the API.
     *
     * @var string
     */
    const HEADER_CONTENT_TYPE = 'text/plain';

    /**
     * The header accept in all requests to the API.
     *
     * @var string
     */
    const HEADER_ACCEPT = 'application/json';

    /**
     * The generic error if cannot load server properly.
     *
     * @var string
     */
    const BLANK_PAGE_ERROR = 'Page not found';

    /**
     * The client instance.
     *
     * @var null|GuzzleHttp\Client
     */
    protected $client = null;

    /**
     * The URL for all API requests.
     *
     * @var null|string
     */
    protected $url = 'http://localhost:8088/v2';

    /**
     * Make secure URL requests.
     *
     * @var null|bool
     */
    protected $ssl = false;

    /**
     * Path to the certificate file for using factomd over TLS.
     *
     * @var null
     */
    protected $certifcate = null;

    /**
     * The provided username for interacting with factomd
     * Optional.
     *
     * @var null
     */
    protected $username = null;

    /**
     * The provided password for interacting with factomd
     * Optional.
     *
     * @var null
     */
    protected $password = null;

    public function __construct(string $url, bool $ssl = false, string $certificate = null, string $username = null, string $password = null)
    {
        $this->url = $url;
        $this->ssl = $ssl;
        $this->certificate = $certificate;
        $this->username = $username;
        $this->password = $password;

        if (! function_exists('curl_init')) {
            throw InvalidFactomApiConfig::noCurlFound();
        } elseif (empty($this->url)) {
            throw InvalidFactomApiConfig::noUrlDefined();
        } elseif (empty($this->certificate) && $this->ssl) {
            throw InvalidFactomApiConfig::noCertificateDefined();
        } elseif (! empty($this->certificate) && $this->ssl) {
            if (preg_match('/^(https:\/\/)/i', $this->url)) {
                throw InvalidFactomApiConfig::noSecureUrlDefined();
            } elseif (! file_exists($this->certificate)) {
                throw InvalidFactomApiConfig::noCertificateExists();
            }
        } elseif (! empty($this->username) && empty($this->password)) {
            throw InvalidFactomApiConfig::noUsernameDefined();
        } elseif (empty($this->username) && ! empty($this->password)) {
            throw InvalidFactomApiConfig::noPasswordDefined();
        }

        if (! $this->ssl) {
            $this->certificate = null;
        }

        $this->client = new Client([
            'base_uri' => rtrim($this->url, '/').'/',
            'timeout' => 10,
            'http_errors' => false,
            'debug' => false,
        ]);
    }

    /**
     * Call the requested endpoint.
     *
     * @param string $actionName
     * @param array $params
     * @param array $extraOptions
     *
     * @return object|string
     *
     * @throws Exception When a Guzzle error occurs
     */
    public function callEndpoint(string $action, string $method, array $params = [], array $extraOptions = [])
    {
        // Check our method...
        if (! in_array(strtoupper($method), ['GET', 'POST'])) {
            throw InvalidFactomApiConfig::invalidMethodCalled();
        }

        $options = [
            'headers' => [
                'Content-Type' => self::HEADER_CONTENT_TYPE,
                'Accept' => self::HEADER_ACCEPT,
            ],
            // 'verify' => false,
            'json' => [
                'jsonrpc' => self::JSON_RPC,
                'id' => self::REQUEST_ID,
                'method' => strtolower($action),
                'params' => $params,
            ],
        ] + $extraOptions;

        // Append certificate verification
        // if ($this->ssl) {
        // $options['verify'] = $this->certificate;
        // $options['cert'] = [
        //     'cert' => [
        //         $this->certificate,
        //         $this->password
        //     ],
        // ];
        // }

        // Append authentication to params
        if (! empty($this->username) && ! empty($this->password)) {
            $options['auth'] = [
                'username' => $this->username,
                'password' => $this->password,
            ];
        }

        $response = null;
        $error = null;

        // Make the call to factom server
        try {
            $response = $this->client->{strtolower($method)}($this->url, $options);
        } catch (RequestException $e) {
            $error = $e->getMessage();
        }

        if (! empty($error)) {
            throw InvalidFactomApiConfig::invalidApiResponse($error, $action);
        }

        $status_code = $response->getStatusCode();
        $reason_phrase = $response->getReasonPhrase();
        $body = (string) $response->getBody()->getContents();

        // Check for empty body
        if (empty($body)) {
            throw InvalidFactomApiConfig::emptyApiResponse($action);
        } elseif ($status_code != 200) {
            throw InvalidFactomApiConfig::invalidApiResponse($reason_phrase, $action);
        }

        // return Json
        if ($json_body = json_decode($body)) {
            // Check for empty result
            if (empty($json_body->result)) {
                throw InvalidFactomApiConfig::emptyApiResponse($action);
            }

            return $json_body->result;
        }

        // return Response
        return $body;
    }
}
