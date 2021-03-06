<?php
/**
 * @link https://pix.st/
 * @copyright Copyright (c) 2015 Pix Street
 * @license MIT License https://opensource.org/licenses/MIT
 */

namespace pixst\actions;

class ImageDownloadAction extends BaseAction
{
    protected $_name = 'image-download';

    /**
     * Sets image ID
     *
     * @param string $id Unique image ID. Max length - 100 characters
     *
     * @return self
     */
    public function setID(string $id)
    {
        $this->_params['id'] = $id;

        return $this;
    }

    public function execute()
    {
        $this->_result = $this->_client->execute($this);

        $this->_success = true;

        return $this;
    }
}
