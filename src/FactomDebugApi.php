<?php

namespace AdrianMejias\FactomApi;

class FactomDebugApi extends FactomConnector
{
    /**
     * Show current holding messages in queue.
     *
     * @url https://docs.factom.com/api#holding-queue
     *
     * @return json { string Messages }
     */
    public function holdingQueue()
    {
        $result = $this->callEndpoint('holding-queue', 'POST');

        // return Result
        return $result;
    }

    /**
     * Get information on the current network factomd is connected to (TEST, MAIN, etc).
     *
     * @url https://docs.factom.com/api#network-info
     *
     * @return json { int NetworkNumber, string NetworkName, int NetworkID }
     */
    public function networkInfo()
    {
        $result = $this->callEndpoint('network-info', 'POST');

        // return Result
        return $result;
    }

    /**
     * Get the predicted future entry credit rate.
     *
     * @url https://docs.factom.com/api#predictive-fer
     *
     * @return json { int PredictiveFER }
     */
    public function predictiveFer()
    {
        $result = $this->callEndpoint('predictive-fer', 'POST');

        // return Result
        return $result;
    }

    /**
     * Get a list of the current network audit servers along with their information.
     *
     * @url https://docs.factom.com/api#audit-servers
     *
     * @return json { array AuditServers }
     */
    public function auditServers()
    {
        $result = $this->callEndpoint('audit-servers', 'POST');

        // return Result
        return $result;
    }

    /**
     * Get a list of the current network federated servers along with their information.
     *
     * @url https://docs.factom.com/api#federated-servers
     *
     * @return json { array FederatedServers }
     */
    public function federatedServers()
    {
        $result = $this->callEndpoint('federated-servers', 'POST');

        // return Result
        return $result;
    }

    /**
     * Get the current configuration state from factomd.
     *
     * @url https://docs.factom.com/api#configuration
     *
     * @return json { object App, object Peer, object Log, object Wallet, object Walletd }
     */
    public function configuration()
    {
        $result = $this->callEndpoint('configuration', 'POST');

        // return Result
        return $result;
    }

    /**
     * Get the process list known to the current factomd instance.
     *
     * @url https://docs.factom.com/api#process-list
     *
     * @return json { ... }
     */
    public function processList()
    {
        $result = $this->callEndpoint('process-list', 'POST');

        // return Result
        return $result;
    }

    /**
     * List of authority servers in the management chain.
     *
     * @url https://docs.factom.com/api#authorities
     *
     * @return json { object Authorities }
     */
    public function authorities()
    {
        $result = $this->callEndpoint('authorities', 'POST');

        // return Result
        return $result;
    }

    /**
     * Causes factomd to re-read the configuration from the config file.
     *
     * @note This may cause consensus problems and could be impractical even in testing.
     *
     * @url https://docs.factom.com/api#reload-configuration
     *
     * @return json { object App, object Peer, object Log, object Wallet, object Walletd }
     */
    public function reloadConfiguration()
    {
        $result = $this->callEndpoint('reload-configuration', 'POST');

        // return Result
        return $result;
    }

    /**
     * Get the current package drop rate for network testing.
     *
     * @url https://docs.factom.com/api#drop-rate
     *
     * @return json { int DropRate }
     */
    public function dropRate()
    {
        $result = $this->callEndpoint('drop-rate', 'POST');

        // return Result
        return $result;
    }

    /**
     * Change the network drop rate for testing.
     *
     * @url https://docs.factom.com/api#set-drop-rate
     *
     * @return json { int DropRate }
     */
    public function setDropRate(int $droprate)
    {
        $result = $this->callEndpoint('set-drop-rate', 'POST', [
      'DropRate' => $droprate,
    ]);

        // return Result
        return $result;
    }

    /**
     * Get the current minute number for the open entry block.
     *
     * @url https://docs.factom.com/api#current-minute
     *
     * @return json { int Minute }
     */
    public function currentMinute(int $droprate)
    {
        $result = $this->callEndpoint('current-minute', 'POST');

        // return Result
        return $result;
    }

    /**
     * Get the current msg delay time for network testing.
     *
     * @url https://docs.factom.com/api#delay
     *
     * @return json { int Delay }
     */
    public function delay()
    {
        $result = $this->callEndpoint('delay', 'POST');

        // return Result
        return $result;
    }

    /**
     * Set the current msg delay time for network testing.
     *
     * @url https://docs.factom.com/api#delay
     *
     * @return json { int Delay }
     */
    public function setDelay(int $delay)
    {
        $result = $this->callEndpoint('set-delay', 'POST', [
      'Delay' => $delay,
    ]);

        // return Result
        return $result;
    }

    /**
     * Get the nodes summary string.
     *
     * @url https://docs.factom.com/api#summary
     *
     * @return json { string Summary }
     */
    public function summary()
    {
        $result = $this->callEndpoint('summary', 'POST');

        // return Result
        return $result;
    }

    /**
     * Get a list of messages from the message journal.
     * @note Must run factomd with '-journaling=true'.
     *
     * @url https://docs.factom.com/api#messages
     *
     * @return json { array Messages }
     */
    public function messages()
    {
        $result = $this->callEndpoint('messages', 'POST');

        // return Result
        return $result;
    }
}
