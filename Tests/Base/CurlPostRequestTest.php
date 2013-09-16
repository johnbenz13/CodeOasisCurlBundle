<?php

namespace CodeOasis\CurlBundle\Tests\Base;

use CodeOasis\CurlBundle\Base\CurlPostRequest;

class CurlPostRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        $curlPostRequest = new CurlPostRequest();
        $curlPostRequest->setUrl("http://www.google.com");

        $this->assertEquals($curlPostRequest->execute(), $curlPostRequest);
    }
}
