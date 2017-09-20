<?php

namespace AdrianMejias\FactomApi;

class FactomApi extends FactomConnector
{
    /**
     * Every directory block has a KeyMR (Key Merkle Root), which can be used to retrieve it.
     *
     * @url https://docs.factom.com/api#directory-block
     *
     * @return json { object header, object entryblocklist }
     */
    public function directoryBlock(string $keymr)
    {
        $result = $this->callEndpoint('directory-block', 'POST', [
      'KeyMR' => $keymr,
    ]);

        // return Result
        return $result;
    }

    /**
     * The directory block head is the last known directory block by factom, or in other words, the
     * most recently recorded block.
     *
     * @url https://docs.factom.com/api#directory-block-head
     *
     * @return json { string keymr }
     */
    public function directoryBlockHead()
    {
        $result = $this->callEndpoint('directory-block-head', 'POST');

        // return Result
        return $result;
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

    /**
     * Retrieve an entry or transaction in raw format, the data is a hex encoded string.
     *
     * @url https://docs.factom.com/api#raw-data
     *
     * @return json { string data }
     */
    public function rawData(string $hash)
    {
        $result = $this->callEndpoint('raw-data', 'POST', [
      'hash' => $hash,
    ]);

        // return Result
        return $result;
    }

    /**
     * Retrieve a directory block given only its height.
     *
     * @url https://docs.factom.com/api#dblock-by-height
     *
     * @return json { object dblock, string rawdata }
     */
    public function dblockByHeight(int $height)
    {
        $result = $this->callEndpoint('dblock-by-height', 'POST', [
      'height' => $height,
    ]);

        // return Result
        return $result;
    }

    /**
     * Retrieve administrative blocks for any given height.
     *
     * @url https://docs.factom.com/api#ablock-by-height
     *
     * @return json { object ablock, string rawdata }
     */
    public function ablockByHeight(int $height)
    {
        $result = $this->callEndpoint('ablock-by-height', 'POST', [
      'height' => $height,
    ]);

        // return Result
        return $result;
    }

    /**
     * Retrieve the entry credit block for any given height.
     *
     * @url https://docs.factom.com/api#ecblock-by-height
     *
     * @return json { object ecblock, string rawdata }
     */
    public function ecblockByHeight(int $height)
    {
        $result = $this->callEndpoint('ecblock-by-height', 'POST', [
      'height' => $height,
    ]);

        // return Result
        return $result;
    }

    /**
     * Retrieve the factoid block for any given height.
     *
     * @url https://docs.factom.com/api#fblock-by-height
     *
     * @return json { object fblock, string rawdata }
     */
    public function fblockByHeight(int $height)
    {
        $result = $this->callEndpoint('fblock-by-height', 'POST', [
      'height' => $height,
    ]);

        // return Result
        return $result;
    }

    /**
     * Retrieve a specified factoid block given its merkle root key.
     *
     * @url https://docs.factom.com/api#factoid-block
     *
     * @return json { object fblock, string rawdata }
     */
    public function factoidBlock(string $keymr)
    {
        $result = $this->callEndpoint('factoid-block', 'POST', [
      'KeyMR' => $keymr,
    ]);

        // return Result
        return $result;
    }

    /**
     * Retrieve a specified entrycredit block given its merkle root key.
     *
     * @url https://docs.factom.com/api#entrycredit-block
     *
     * @return json { object ecblock, string rawdata }
     */
    public function entrycreditBlock(string $keymr)
    {
        $result = $this->callEndpoint('entrycredit-block', 'POST', [
      'KeyMR' => $keymr,
    ]);

        // return Result
        return $result;
    }

    /**
     * Retrieve a specified admin block given its merkle root key.
     *
     * @url https://docs.factom.com/api#admin-block
     *
     * @return json { object ablock, string rawdata }
     */
    public function adminBlock(string $keymr)
    {
        $result = $this->callEndpoint('admin-block', 'POST', [
      'KeyMR' => $keymr,
    ]);

        // return Result
        return $result;
    }

    /**
     * Retrieve a specified entry block given its merkle root key.
     *
     * @url https://docs.factom.com/api#entry-block
     *
     * @return json { object header, object entrylist }
     */
    public function entryBlock(string $keymr)
    {
        $result = $this->callEndpoint('entry-block', 'POST', [
      'KeyMR' => $keymr,
    ]);

        // return Result
        return $result;
    }

    /**
     * Get an Entry from factomd specified by the Entry Hash.
     *
     * @url https://docs.factom.com/api#entry
     *
     * @return json { string chainid, string content, array extids }
     */
    public function entry(string $hash)
    {
        $result = $this->callEndpoint('entry', 'POST', [
      'Hash' => $hash,
    ]);

        // return Result
        return $result;
    }

    /**
     * Returns an array of the entries that have been submitted but have not been recoreded into the blockchain.
     *
     * @url https://docs.factom.com/api#pending-entries
     *
     * @return json { array ... }
     */
    public function pendingEntries()
    {
        $result = $this->callEndpoint('pending-entries', 'POST');

        // return Result
        return $result;
    }

    /**
     * Retrieve details of a factoid transaction using a transactions hash.
     *
     * @url https://docs.factom.com/api#transaction
     *
     * @return json { object ... }
     */
    public function transaction(string $hash)
    {
        $result = $this->callEndpoint('transaction', 'POST', [
      'hash' => $hash,
    ]);

        // return Result
        return $result;
    }

    /**
     * This api call is used to find the status of a transaction, whether it be a factoid, reveal entry, or commit entry.
     *
     * @url https://docs.factom.com/api#ack
     *
     * @return json { object ... }
     */
    public function ack(string $hash, string $chainid, string $fulltransaction = null)
    {
        $result = $this->callEndpoint('ack', 'POST', [
      'hash' => $hash,
      'chainid' => $chainid,
      'fulltransaction' => $fulltransaction,
    ]);

        // return Result
        return $result;
    }

    /**
     * Factoid Acknowledgements will give the current status of a transaction.
     *
     * @status Depricated - please refer to ack.
     *
     * @url https://docs.factom.com/api#factoid-ack
     *
     * @return json { object ... }
     */
    public function factoidAck(string $txid)
    {
        $result = $this->callEndpoint('factoid-ack', 'POST', [
      'TxID' => $txid,
    ]);

        // return Result
        return $result;
    }

    /**
     * Entry Acknowledgements will give the current status of a transaction.
     *
     * @status Depricated - please refer to ack.
     *
     * @url https://docs.factom.com/api#factoid-ack
     *
     * @return json { object ... }
     */
    public function entryAck(string $txid)
    {
        $result = $this->callEndpoint('entry-ack', 'POST', [
      'TxID' => $txid,
    ]);

        // return Result
        return $result;
    }

    /**
     * Retrieve a reciept providing cryptographially verfiable proof that information was
     * recorded in the factom blockchain and that this was subsequently anchored in the
     * bitcoin blockchain.
     *
     * @url https://docs.factom.com/api#receipt
     *
     * @return json { object ... }
     */
    public function receipt(string $hash)
    {
        $result = $this->callEndpoint('receipt', 'POST', [
      'hash' => $hash,
    ]);

        // return Result
        return $result;
    }

    /**
     * Returns an array of factoid transactions that have not yet been recorded in the blockchain,
     * but are known to the system.
     *
     * @url https://docs.factom.com/api#pending-transactions
     *
     * @return json { string TransactionID, string Status }
     */
    public function pendingTransactions(string $address)
    {
        $result = $this->callEndpoint('pending-transactions', 'POST', [
      'Address' => $address,
    ]);

        // return Result
        return $result;
    }

    /**
     * Return the keymr of the head of the chain for a chain ID
     * (the unique hash created when the chain was created).
     *
     * @url https://docs.factom.com/api#chain-head
     *
     * @return json { string ChainHead }
     */
    public function chainHead(string $chainid)
    {
        $result = $this->callEndpoint('chain-head', 'POST', [
      'ChainID' => $chainid,
    ]);

        // return Result
        return $result;
    }

    /**
     * Return its current balance for a specific entry credit address.
     *
     * @url https://docs.factom.com/api#entry-credit-balance
     *
     * @return json { int balance }
     */
    public function entryCreditBalance(string $address)
    {
        $result = $this->callEndpoint('entry-credit-balance', 'POST', [
      'address' => $address,
    ]);

        // return Result
        return $result;
    }

    /**
     * This call returns the number of Factoshis (Factoids *10^-8) that are currently
     * available at the address specified.
     *
     * @url https://docs.factom.com/api#factoid-balance
     *
     * @return json { int balance }
     */
    public function factoidBalance(string $address)
    {
        $result = $this->callEndpoint('factoid-balance', 'POST', [
      'address' => $address,
    ]);

        // return Result
        return $result;
    }

    /**
     * Returns the number of Factoshis (Factoids *10^-8) that purchase a single Entry Credit.
     *
     * @url https://docs.factom.com/api#entry-credit-rate
     *
     * @return json { int rate }
     */
    public function entryCreditRate()
    {
        $result = $this->callEndpoint('entry-credit-rate', 'POST');

        // return Result
        return $result;
    }

    /**
     * Retrieve current properties of the Factom system, including the software and the API versions.
     *
     * @url https://docs.factom.com/api#properties
     *
     * @return json { string factomdversion, string factomdapiversion }
     */
    public function properties()
    {
        $result = $this->callEndpoint('properties', 'POST');

        // return Result
        return $result;
    }

    /**
     * Submit a factoid transaction.
     *
     * @url https://docs.factom.com/api#factoid-submit
     *
     * @return json { string message, string txid }
     */
    public function factoidSubmit(string $transaction)
    {
        $result = $this->callEndpoint('factoid-submit', 'POST', [
      'transaction' => $transaction,
    ]);

        // return Result
        return $result;
    }

    /**
     * Send a Chain Commit Message to factomd to create a new Chain.
     *
     * @url https://docs.factom.com/api#commit-chain
     *
     * @return json { string message, string txid, string entryhash, string chainid }
     */
    public function commitChain(string $message)
    {
        $result = $this->callEndpoint('commit-chain', 'POST', [
      'message' => $message,
    ]);

        // return Result
        return $result;
    }

    /**
     * Reveal the First Entry in a Chain to factomd after the Commit to compleate the Chain creation.
     *
     * @url https://docs.factom.com/api#reveal-chain
     *
     * @return json { string message, string txid, string entryhash, string chainid }
     */
    public function revealChain(string $entry)
    {
        $result = $this->callEndpoint('reveal-chain', 'POST', [
      'entry' => $entry,
    ]);

        // return Result
        return $result;
    }

    /**
     * Send an Entry Commit Message to factom to create a new Entry.
     *
     * @url https://docs.factom.com/api#commit-entry
     *
     * @return json { string message, string txid, string entryhash }
     */
    public function commitEntry(string $message)
    {
        $result = $this->callEndpoint('commit-entry', 'POST', [
      'message' => $message,
    ]);

        // return Result
        return $result;
    }

    /**
     * Reveal an Entry to factomd after the Commit to compleate the Entry creation.
     *
     * @url https://docs.factom.com/api#reveal-entry
     *
     * @return json { string message, string txid, string entryhash, string chainid }
     */
    public function revealEntry(string $entry)
    {
        $result = $this->callEndpoint('reveal-entry', 'POST', [
      'entry' => $entry,
    ]);

        // return Result
        return $result;
    }

    /**
     * Send a raw hex encoded binary message to the Factom network.
     *
     * @url https://docs.factom.com/api#send-raw-message
     *
     * @return json { string message }
     */
    public function sendRawMessage(string $message)
    {
        $result = $this->callEndpoint('send-raw-message', 'POST', [
      'message' => $message,
    ]);

        // return Result
        return $result;
    }
}
