<?php
/**
 * @link https://pix.st/
 * @copyright Copyright (c) 2015 Pix Street
 * @license MIT License https://opensource.org/licenses/MIT
 */

namespace pixst;

use pixst\Client;
use pixst\Connection;

/**
 * ClientJson is a wrapper for Client class which forces usage of JSON for Pix Street API requests
 */
class ClientJson extends Client
{
    /**
     * Constructor
     * @param string $apiKey Pix Street API key
     * @param string $channel Type of channel to use. Currently 'curl' is the only supported channel.
     */
    public function __construct($apiKey = null, $channel = Connection::CHANNEL_CURL)
    {
        parent::__construct($apiKey, $channel);
        $this->setApi('json');
    }
}
