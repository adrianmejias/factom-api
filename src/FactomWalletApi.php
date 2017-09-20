<?php

namespace AdrianMejias\FactomApi;

class FactomWalletApi extends FactomConnector
{
    /**
     * Example of an invalid method.
     *
     * @url https://docs.factom.com/api#errors45
     *
     * @return json { int code, string message }
     */
    public function errors()
    {
        $result = $this->callEndpoint('bad', 'GET');

        // return Result
        return $result;
    }
}
