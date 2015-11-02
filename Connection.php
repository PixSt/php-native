<?php
/**
 * @link https://pix.st/
 * @copyright Copyright (c) 2015 Pix Street
 * @license MIT License https://opensource.org/licenses/MIT
 */

namespace pixst;

use pixst\CurlChannel;

/**
 * Connection class performes requests using channels
 */
class Connection
{
    /**
     * @const string cURL connection channel
     */
    const CHANNEL_CURL = 'curl';

    /**
     * @var array $_headers Additional headers for requests
     */
    protected $_headers = [];

    /**
     * @var ChannelInterface $_channel Connection channel
     */
    protected $_channel;

    /**
     * @var string $_type Type of connection channel to use
     */
    protected $_type;

    /**
     * @var string $_apiEndpoint Pix Street API endpoint URL
     */
    protected $_apiEndpoint;

    /**
     * Constructor
     *
     * @param string $type Type of connection channel to use
     */
    public function __construct($type)
    {
        $this->_type = $type;
    }

    /**
     * Sets API endpoint
     *
     * @param string $apiEndpoint API endpoint
     */
    public function setApiEndpoint($apiEndpoint)
    {
        $this->_apiEndpoint = $apiEndpoint;
    }

    /**
     * Add header to list of additional headers
     *
     * @param string $name Header name
     * @param string $value Header value
     * @return Connection Connection object itself
     */
    public function addHeader($name, $value)
    {
        $this->_headers[$name] = $value;

        return $this;
    }

    /**
     * Perform Pix Street API request
     *
     * @param string $body Request body
     * @return string Pix Street API response
     * @throws Exception on connection or API error
     */
    public function request($body)
    {
        return $this->getChannel()
            ->setUrl($this->_apiEndpoint)
            ->setHeaders($this->_headers)
            ->setMethod('POST')
            ->setBody($body)
            ->query();
    }

    /**
     * Get connection channel
     *
     * @return ChannelInterface Connection channel
     */
    protected function getChannel()
    {
        if ($this->_channel === null) {
            switch ($this->_type) {
                case self::CHANNEL_CURL:
                    $this->_channel = new CurlChannel();
                    break;
            }
        }

        return $this->_channel;
    }
}
