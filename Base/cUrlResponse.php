<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ronena
 * Date: 8/26/12
 * Time: 9:04 AM
 * To change this template use File | Settings | File Templates.
 */

namespace cUrl\HttpBundle\Base;

/**
 * Encapsulates a cUrl response and allows method to easily access the response information
 *
 * @author ronena
 */
class cUrlResponse
{
    /**
     * @var string
     */
    protected $body;

    /**
     * @var array
     */
    protected $info;

    /**
     * constructor, takes the response body and an info array as it's parameters
     * @param string $body
     * @param array $info
     */
    public function __construct($body, $info)
    {
        $this->body = $body;
        $this->info = $info;
    }

    /**
     * @return integer
     */
    public function getHttpCode()
    {
        return $this->info['http_code'];
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return bool
     */
    public function isSuccessful()
    {
        if ($this->info['http_code'] === 200) {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->info['content_type'];
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->info['url'];
    }
}