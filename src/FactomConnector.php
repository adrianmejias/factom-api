<?php

namespace AdrianMejias\FactomApi;

use Illuminate\Support\Collection;

class FactomConnector
{
  /**
   * The JSON RPC spec that the API uses
   */
  const JSON_RPC = '2.0';
  /**
   * The "ID" param provided in all requests to the API
   */
  const REQUEST_ID = 0;
  /**
   * The header content type in all requests to the API
   */
  const HEADER_CONTENT_TYPE = 'text/plain';
  /**
   * The generic error if cannot load server properly
   */
  const BLANK_PAGE_ERROR = 'Page not found';

  /**
   * The URL for all API requests
   *
   * @var null|string
   */
  protected $url;

  /**
   * Make secure URL requests
   *
   * @var null|boolean
   */
  protected $ssl;
  
  /**
   * Path to the certificate file for using factomd over TLS
   *
   * @var null
   */
  protected $certifcate;

  /**
   * The provided username for interacting with factomd
   * Optional
   *
   * @var null
   */
  protected $username;

  /**
   * The provided password for interacting with factomd
   * Optional
   *
   * @var null
   */
  protected $password;

  public function __construct(string $url, bool $ssl = false, string $certificate = null, string $username = null, string $password = null)
  {
    $this->url = $url;
    $this->ssl = $ssl;
    $this->certificate = $certificate;
    $this->username = $username;
    $this->password = $password;

    if (!function_exists('curl_init')) {
        abort(503, 'The Factom API integration requires the cURL extension, please see http://curl.haxx.se/docs/install.html to install it');
    } elseif (empty($this->url)) {
        throw InvalidFactomApiConfig::noUrlDefined();
    } elseif (empty($this->certificate) && $this->ssl) {
      abort(503, 'When enabling SSL configuration, you must ensure to define a certificate');
    } elseif (!empty($this->certificate) && $this->ssl) {
        if (preg_match('/^(https:\/\/)/i', $this->url)) {
            abort(503, 'When defining a certificate, you must ensure the host is using HTTPS');
        } elseif (!file_exists($this->certificate)) {
            abort(503, 'Can\'t find provided certificate file');
        }
    } elseif (!empty($this->username) && empty($this->password)) {
        abort(503, 'You must provide a password with a username.');
    } elseif (empty($this->username) && !empty($this->password)) {
        abort(503, 'You must provide a username with a password.');
    }

    if (!$this->ssl) {
      $this->certificate = null;
    }
  }

  /**
   * Initialize the cURL request with all requested params
   *
   * @param string $actionName
   * @param string $method
   * @param array $binaryDataParams
   * @param array $customOptions
   * @return array
   * @throws Exception - ensures we are passing in viable methods
   */
  private function gatherCurlOptions(string $actionName, string $method, array $binaryDataParams = [], array $customOptions = [])
  {
      if (!in_array(strtoupper($method), ['GET', 'POST'])) {
          abort(503, 'Supplied method must match GET or POST');
      }

      $options = [
          CURLOPT_HTTPHEADER => [
            'Content-Type: ' . self::HEADER_CONTENT_TYPE
          ],
          CURLOPT_HEADER => false,
          CURLOPT_POSTFIELDS => json_encode([
            'jsonrpc' => self::JSON_RPC,
            'id' => self::REQUEST_ID,
            'method' => $actionName,
            'params' => $binaryDataParams,
          ]),
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
          // CURLOPT_URL => $this->url,
          CURLOPT_POST => strtoupper($method) == 'POST' ? 1 : 0,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 10,
          /*
           * Auth related cURL params
           */
          CURLOPT_USERPWD => !empty($this->username) && !empty($this->password) ? $this->username.':'.$this->password : false,
          CURLOPT_HTTPAUTH => !empty($this->username) && !empty($this->password) ? CURLAUTH_ANY : false,
          /*
           * Cert / SSL related cURL params
           */
          CURLOPT_SSL_VERIFYPEER => false,
      ] + $customOptions;

      // return Result
      return $options;
  }

  /**
   * Call the requested endpoint.
   *
   * @param string $actionName
   * @param array $binaryDataParams
   * @param array $curlOptions
   * @param bool $asObj
   *
   * @return object|string
   *
   * @throws Exception When a cURL error occurs
   */
  public function callEndpoint(string $actionName, string $method, array $binaryDataParams = [], array $curlOptions = [])
  {
      $curlOptions = $this->gatherCurlOptions($actionName, $method, $binaryDataParams, $curlOptions);

      $ch = curl_init($this->url);
      curl_setopt_array($ch, $curlOptions);
      $result = curl_exec($ch);
      $error = curl_error($ch);
      $info = curl_getinfo($ch);
      curl_close($ch);
      
      if (!$error && strtoupper($result) == strtoupper(self::BLANK_PAGE_ERROR)) {
          $error = self::BLANK_PAGE_ERROR;
      }

      if ($error) {
          abort(503, 'Received error "' . $error . '" when hitting "' . $actionName . '" within the Factom API');
      } elseif (!$result) {
          abort(503, 'Received an empty response when hitting "' . $actionName . '" within the Factom API');
      }

      $response = json_decode($result);

      if (is_object($response) && !empty($response->result)) {
        return $response->result;
      }

      if (is_object($response) && !empty($response->error)) {
        return $response->error;
      }

      // return Result
      return null;
  }

  /**
   * Returns various heights that allows you to view the state of the blockchain.
   * 
   * @url https://docs.factom.com/api#heights
   * 
   * @return json { ... }
   */
  public function heights()
  {
    $result = $this->callEndpoint('heights', 'POST');

    // return Result
    return $result;
  }

}
