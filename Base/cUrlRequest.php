<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ronena
 * Date: 8/26/12
 * Time: 9:04 AM
 * To change this template use File | Settings | File Templates.
 */

namespace cUrl\HttpBundle\Base;

use cUrl\HttpBundle\Exceptions\EmptyResponseException;
use cUrl\HttpBundle\Exceptions\UnableToInitializeException;

/**
 * Represents a cUrl request. Implementing methods define the doExecute method to change the cUrl handler.
 *
 * @author ronena
 * @abstract
 */
abstract class cUrlRequest
{
    /**
     * the url for the request to be directed to
     * @var string
     */
    protected $url;

    /**
     * parameters to send with the request
     * @var array
     */
    protected $params;

    /**
     * http headers to send with the request
     * @var array
     */
    protected $headers;

    /**
     * @var cUrlResponse
     */
    protected $response;

    /**
     * cookie
     * @var string
     */
    protected $cookie;


    /**
     * sends the request and populates the response property
     */
    public function execute()
    {
        // initiate a cUrl handler
        $ch = curl_init();

        // make sure a handler has been initialized
        if ($ch === false) {
            throw new UnableToInitializeException($ch);
        }

        // set request headers' options, the implementing class can override these default options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // if a header has been requested, set it
        if (isset($this->headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        }
        if (isset($this->cookie)){
            curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);

        }

        // allow every implementation do it's part
        $ch = $this->doExecute($ch);

        // fetch the cUrl resources
        $body = curl_exec($ch);
        $info = curl_getinfo($ch);

        // do final error checks to make sure the request has made it through
        if (empty($body) || empty($info)) {
            throw new EmptyResponseException($ch);
        }

        // create a new response object
        $this->response = new cUrlResponse($body, $info);

        // close the handler
        curl_close($ch);

        // return $this for easy method chaining
        return $this;
    }

    /**
     * implementing classes define this method to change the cUrl handler
     * @abstract
     * @param mixed $ch
     * @return mixed
     */
    abstract protected function doExecute($ch);

    /**
     * implementing classes define this method to change the cUrl handler
     * @abstract
     * @param mixed $ch
     * @return mixed
     */

    /**
     * @param string $url
     * @return cUrlRequest
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $params
     * @return cUrlRequest
     */
    public function setParams($params)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param array $headers
     * @return cUrlRequest
     */
    public function setHeaders(Array $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return cUrlResponse
     */
    public function getResponse()
    {
        if (isset($this->response) === false) {
            $this->execute();
        }

        return $this->response;
    }

    /**
     * @param $cookie
     */
    public function setCookie($cookie)
    {
        $this->cookie = $cookie;
    }

    /**
     * @return mixed
     */
    public function getCookie()
    {
        return $this->cookie;
    }

}