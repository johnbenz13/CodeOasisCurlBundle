<?php

namespace CodeOasis\CurlBundle\Tests\Base;

use CodeOasis\CurlBundle\Base\CurlResponse;

class CurlResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testIsSuccessful()
    {
        $body = '<html></html>';
        $info = array('http_code' => 200);

        $curlResponse = new CurlResponse($body, $info);

        $this->assertTrue($curlResponse->isSuccessful());
    }

    public function testInfo()
    {
        $body = '<html></html>';
        $info = array(
            'http_code' => 200,
            'content_type' => 'application/json',
            'url' => 'http://www.foo.com/about.json',
        );

        $curlResponse = new CurlResponse($body, $info);

        $this->assertEquals($curlResponse->getHttpCode(), $info['http_code']);
        $this->assertEquals($curlResponse->getUrl(), $info['url']);
        $this->assertEquals($curlResponse->getContentType(), $info['content_type']);
    }

    public function testBody()
    {
        $body = '<html></html>';
        $info = array(
            'http_code' => 404,
        );

        $curlResponse = new CurlResponse($body, $info);

        $this->assertFalse($curlResponse->isSuccessful());
        $this->assertEquals($curlResponse->getBody(), $body);
    }
}
