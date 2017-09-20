<?php

return [
  
  /**
   * Base credentials for Factom server.
   */
  'url' => env('FACTOM_URL', 'http://localhost:8088/v2'),

  'ssl' => [
    'enable' => env('FACTOM_SSL', false),
    'certificate' => env('FACTOM_CERTIFICATE', storage_path('app/factomdAPIpub.cert')),
  ],

  'username' => env('FACTOM_USERNAME'),

  'password' => env('FACTOM_PASSWORD'),

  /**
   * Factom wallet server credentials.
   */
  'wallet' => [
    'url' => env('FACTOM_WALLET_URL', 'http://localhost:8089/v2'),

    'ssl' => [
      'enable' => env('FACTOM_WALLET_SSL', false),
      'certificate' => env('FACTOM_WALLET_CERTIFICATE', storage_path('app/factomdAPIpub.cert')),
    ],

    'username' => env('FACTOM_WALLET_USERNAME'),

    'password' => env('FACTOM_WALLET_PASSWORD'),
  ],

  /**
   * Factom debug server credentials.
   */
  'debug' => [
    'url' => env('FACTOM_DEBUG_URL', 'http://localhost:8088/debug'),

    'ssl' => [
      'enable' => env('FACTOM_DEBUG_SSL', false),
      'certificate' => env('FACTOM_DEBUG_CERTIFICATE', storage_path('app/factomdAPIpub.cert')),
    ],

    'username' => env('FACTOM_DEBUG_USERNAME'),

    'password' => env('FACTOM_DEBUG_PASSWORD'),
  ],

];
