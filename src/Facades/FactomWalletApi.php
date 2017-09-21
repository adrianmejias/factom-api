<?php

namespace AdrianMejias\FactomApi\Facades;

use Illuminate\Support\Facades\Facade;

class FactomWalletApi extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'FactomWalletApi';
    }
}
