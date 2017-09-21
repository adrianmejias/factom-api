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

    /**
     * Retrieve the public and private parts of a Factoid or Entry Credit address stored in the wallet.
     *
     * @url https://docs.factom.com/api#address
     *
     * @return json { string public, string secret }
     */
    public function address(string $address)
    {
        $result = $this->callEndpoint('address', 'GET', [
            'address' => $address,
        ]);

        // return Result
        return $result;
    }

    /**
     * Retrieve all of the Factoid and Entry Credit addresses stored in the wallet.
     *
     * @url https://docs.factom.com/api#all-address
     *
     * @return json { array addresses }
     */
    public function allAddress(string $address)
    {
        $result = $this->callEndpoint('all-address', 'GET');

        // return Result
        return $result;
    }

    /**
     * Create a new Entry Credit Address and store it in the wallet.
     *
     * @url https://docs.factom.com/api#generate-ec-address
     *
     * @return json { string public, string secret }
     */
    public function generateEcAddress()
    {
        $result = $this->callEndpoint('generate-ec-address', 'GET');

        // return Result
        return $result;
    }

    /**
     * Create a new Entry Credit Address and store it in the wallet.
     *
     * @url https://docs.factom.com/api#generate-factoid-address
     *
     * @return json { string public, string secret }
     */
    public function generateFactoidAddress()
    {
        $result = $this->callEndpoint('generate-factoid-address', 'GET');

        // return Result
        return $result;
    }

    /**
     * Get the current hight of blocks that have been cached by the wallet while syncing.
     *
     * @url https://docs.factom.com/api#get-height
     *
     * @return json { int height }
     */
    public function getHeight()
    {
        $result = $this->callEndpoint('get-height', 'GET');

        // return Result
        return $result;
    }

    /**
     * Import Factoid and/or Entry Credit address secret keys into the wallet.
     *
     * @url https://docs.factom.com/api#import-addresses
     *
     * @return json { array addresses }
     */
    public function importAddresses(string $addresses)
    {
        $result = $this->callEndpoint('addresses', 'GET', [
            'addresses' => $addresses,
        ]);

        // return Result
        return $result;
    }

    /**
     * Import a Koinify crowd sale address into the wallet.
     *
     * @url https://docs.factom.com/api#import-koinify
     *
     * @return json { string public, string secret }
     */
    public function importKoinify(string $words)
    {
        $result = $this->callEndpoint('import-koinify', 'GET', [
            'words' => $words,
        ]);

        // return Result
        return $result;
    }

    /**
     * Return the wallet seed and all addresses in the wallet for backup and offline storage.
     *
     * @url https://docs.factom.com/api#wallet-backup
     *
     * @return json { string wallet-seed, array addresses }
     */
    public function walletBackup()
    {
        $result = $this->callEndpoint('wallet-backup', 'GET');

        // return Result
        return $result;
    }

    /**
     * This will retrieve all transactions within a given block height range.
     *
     * @url https://docs.factom.com/api#transactions-retrieving
     *
     * @return json { array transactions }
     */
    public function transactionsByRange(int $start, int $end)
    {
        $result = $this->callEndpoint('transactions', 'POST');

        // return Result
        return $result;
    }

    /**
     * This will retrieve a transaction by the given TxID.
     *
     * @url https://docs.factom.com/api#by-txid
     *
     * @return json { array transactions }
     */
    public function transactionsByTxID(string $txid)
    {
        $result = $this->callEndpoint('transactions', 'POST');

        // return Result
        return $result;
    }

    /**
     * Retrieves all transactions that an address is apart of.
     *
     * @url https://docs.factom.com/api#by-address
     *
     * @return json { array transactions }
     */
    public function transactionsByAddress(string $address)
    {
        $result = $this->callEndpoint('transactions', 'POST', [
            'address' => $address,
        ]);

        // return Result
        return $result;
    }

    /**
     * The developers were so preoccupied with whether or not they could,
     * they didn’t stop to think if they should.
     *
     * @url https://docs.factom.com/api#all-transactions
     *
     * @warning The amount of data returned by this is so large.
     *
     * @return json { array transactions }
     */
    public function transactions(string $address)
    {
        $result = $this->callEndpoint('transactions', 'POST');

        // return Result
        return $result;
    }

    /**
     * Lists all the current working transactions in the wallet.
     *
     * @url https://docs.factom.com/api#tmp-transactions
     *
     * @return json { array transactions }
     */
    public function tmpTransactions(string $address)
    {
        $result = $this->callEndpoint('tmp-transactions', 'POST');

        // return Result
        return $result;
    }

    /**
     * Deletes a working transaction in the wallet.
     *
     * @url https://docs.factom.com/api#delete-transaction
     *
     * @return json { object ... }
     */
    public function deleteTransaction(string $txname)
    {
        $result = $this->callEndpoint('delete-transaction', 'GET', [
            'tx-name' => $txname,
        ]);

        // return Result
        return $result;
    }

    /**
     * This will create a new transaction.
     *
     * @url https://docs.factom.com/api#new-transaction
     *
     * @return json { object ... }
     */
    public function newTransaction(string $txname)
    {
        $result = $this->callEndpoint('new-transaction', 'GET', [
            'tx-name' => $txname,
        ]);

        // return Result
        return $result;
    }

    /**
     * Adds an input to the transaction from the given address.
     *
     * @url https://docs.factom.com/api#add-input
     *
     * @return json { object ... }
     */
    public function addInput(string $txname, string $address, int $amount)
    {
        $result = $this->callEndpoint('add-input', 'POST', [
            'tx-name' => $txname,
            'address' => $address,
            'amount' => $amount,
        ]);

        // return Result
        return $result;
    }

    /**
     * Adds a factoid address output to the transaction.
     *
     * @url https://docs.factom.com/api#add-output
     *
     * @return json { object ... }
     */
    public function addOutput(string $txname, string $address, int $amount)
    {
        $result = $this->callEndpoint('add-output', 'POST', [
            'tx-name' => $txname,
            'address' => $address,
            'amount' => $amount,
        ]);

        // return Result
        return $result;
    }

    /**
     * When adding entry credit outputs, the amount given is in factoshis, not entry credtis.
     *
     * @url https://docs.factom.com/api#add-ec-output
     *
     * @return json { object ... }
     */
    public function addEcOutput(string $txname, string $address, int $amount)
    {
        $result = $this->callEndpoint('add-ec-output', 'POST', [
            'tx-name' => $txname,
            'address' => $address,
            'amount' => $amount,
        ]);

        // return Result
        return $result;
    }

    /**
     * Addfee is a shortcut and safeguard for adding the required additonal factoshis to covert the fee.
     *
     * @url https://docs.factom.com/api#add-fee
     *
     * @return json { object ... }
     */
    public function addFee(string $txname, string $address)
    {
        $result = $this->callEndpoint('add-fee', 'POST', [
            'tx-name' => $txname,
            'address' => $address,
        ]);

        // return Result
        return $result;
    }

    /**
     * When paying from a transaction, you can also make the recieving transaction pay for it.
     *
     * @url https://docs.factom.com/api#sub-fee
     *
     * @return json { object ... }
     */
    public function subFee(string $txname, string $address)
    {
        $result = $this->callEndpoint('sub-fee', 'POST', [
            'tx-name' => $txname,
            'address' => $address,
        ]);

        // return Result
        return $result;
    }

    /**
     * Signs the transaction. It is now ready to be signed.
     *
     * @url https://docs.factom.com/api#sign-transaction
     *
     * @return json { object ... }
     */
    public function signTransaction(string $txname)
    {
        $result = $this->callEndpoint('sign-transaction', 'POST', [
            'tx-name' => $txname,
        ]);

        // return Result
        return $result;
    }

    /**
     * Signs the transaction. It is now ready to be signed.
     *
     * @url https://docs.factom.com/api#compose-transaction
     *
     * @return json { object ... }
     */
    public function composeTransaction(string $txname)
    {
        $result = $this->callEndpoint('compose-transaction', 'POST', [
            'tx-name' => $txname,
        ]);

        // return Result
        return $result;
    }

    /**
     * This method, compose-chain, will return the appropriate api calls to create a chain in factom.
     *
     * @url https://docs.factom.com/api#compose-chain
     *
     * @return json { object ... }
     */
    public function composeChain(array $extids, string $content, string $ecpub)
    {
        $result = $this->callEndpoint('compose-chain', 'POST', [
            'chain' => [
                'firstentry' => [
                    'extids' => $extids,
                    'content' => $content,
                ],
            ],
            'ecpub' => $ecpub,
        ]);

        // return Result
        return $result;
    }

    /**
     * This method, compose-entry, will return the appropriate api calls to create a entry in factom.
     *
     * @url https://docs.factom.com/api#compose-entry
     *
     * @return json { object ... }
     */
    public function composeEntry(string $chainid, array $extids, string $content, string $ecpub)
    {
        $result = $this->callEndpoint('compose-entry', 'POST', [
            'entry' => [
                'chainid' => $chainid,
                'extids' => $extids,
                'content' => $content,
            ],
            'ecpub' => $ecpub,
        ]);

        // return Result
        return $result;
    }

    /**
     * Retrieve current properties of factom-walletd, including the wallet and wallet API versions.
     *
     * @url https://docs.factom.com/api#properties
     *
     * @return json { string walletversion, string walletapiversion }
     */
    public function properties()
    {
        $result = $this->callEndpoint('properties', 'POST');

        // return Result
        return $result;
    }
}
