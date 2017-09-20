<?php

namespace AdrianMejias\FactomApi\Facades;

use Illuminate\Support\Facades\Facade;

class FactomApi extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'FactomApi';
    }
}