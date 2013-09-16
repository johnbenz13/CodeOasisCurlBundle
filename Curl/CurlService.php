<?php

namespace CodeOasis\CurlBundle\Curl;

use CodeOasis\CurlBundle\Base\CurlPostRequest;
use CodeOasis\CurlBundle\Base\CurlPutRequest;
use CodeOasis\CurlBundle\Base\CurlGetRequest;

/**
 * Acts as a layer for retrieving different Curl requests
 *
 * @author Ronen Amiel <ronena@codeoasis.com>
 */
class CurlService
{
    /**
     * @var string
     */
    protected $getRequestClass;

    /**
     * @var string
     */
    protected $postRequestClass;

    /**
     * @var string
     */
    protected $putRequestClass;

    /**
     * @param array $config
     */
    public function __construct(Array $config)
    {
        $this->getRequestClass = $config['getRequestClass'];
        $this->postRequestClass = $config['postRequestClass'];
        $this->putRequestClass = $config['putRequestClass'];
    }

    /**
     * @return CurlGetRequest
     */
    public function createGetRequest()
    {
        return new $this->getRequestClass;
    }

    /**
     * @return CurlPostRequest
     */
    public function createPostRequest()
    {
        return new $this->postRequestClass;
    }

    /**
     * @return CurlPutRequest
     */
    public function createPutRequest()
    {
        return new $this->putRequestClass;
    }
}
