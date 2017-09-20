<?php

namespace AdrianMejias\FactomApi\Facades;

use Illuminate\Support\Facades\Facade;

class FactomWalletApiFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'factomWalletApi';
    }
}