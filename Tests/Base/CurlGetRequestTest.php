<?php

namespace CodeOasis\CurlBundle\Tests\Base;

use CodeOasis\CurlBundle\Base\CurlGetRequest;

class CurlGetRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        $curlGetRequest = new CurlGetRequest();
        $url = "http://www.google.com";
        $curlGetRequest->setUrl($url);

        $this->assertEquals($curlGetRequest->execute(), $curlGetRequest);
    }

    public function testExecuteWithParams()
    {
        $curlGetRequest = new CurlGetRequest();
        $url = "http://www.google.com";
        $curlGetRequest->setUrl($url);
        $curlGetRequest->setParams(array('foo' => 'bar'));

        $this->assertEquals($curlGetRequest->execute(), $curlGetRequest);
    }
}
