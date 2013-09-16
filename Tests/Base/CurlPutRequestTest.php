<?php

namespace CodeOasis\CurlBundle\Tests\Base;

use CodeOasis\CurlBundle\Base\CurlPutRequest;

class CurlPutRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        $curlPutRequest = new CurlPutRequest();
        $curlPutRequest->setUrl("http://www.google.com");

        $this->assertEquals($curlPutRequest->execute(), $curlPutRequest);
    }
}
