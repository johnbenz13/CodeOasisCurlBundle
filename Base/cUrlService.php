<?php
/**
 * Ronen Amiel <ronena@codeoasis.com>
 * 9/19/12, 3:25 PM
 * cUrlService.php
 */

namespace cUrl\HttpBundle\Base;

use cUrl\HttpBundle\Base\cUrlPostRequest;
use cUrl\HttpBundle\Base\cUrlPutRequest;
use cUrl\HttpBundle\Base\cUrlGetRequest;

/**
 * Acts as a layer for retrieving different cUrl requests
 *
 * @author ronena
 */
class cUrlService
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
     * @return cUrlGetRequest
     */
    public function createGetRequest()
    {
        return new $this->getRequestClass;
    }

    /**
     * @return cUrlPostRequest
     */
    public function createPostRequest()
    {
        return new $this->postRequestClass;
    }

    /**
     * @return cUrlPutRequest
     */
    public function createPutRequest()
    {
        return new $this->putRequestClass;
    }
}