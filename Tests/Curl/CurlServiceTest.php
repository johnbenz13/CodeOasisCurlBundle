<?php

namespace CodeOasis\CurlBundle\Tests\Curl;

use CodeOasis\CurlBundle\Curl\CurlService;

class CurlServiceTest extends \PHPUnit_Framework_TestCase
{
    protected static $classes = array(
        'getRequestClass' => 'CodeOasis\CurlBundle\Base\CurlGetRequest',
        'postRequestClass' => 'CodeOasis\CurlBundle\Base\CurlPostRequest',
        'putRequestClass' => 'CodeOasis\CurlBundle\Base\CurlPutRequest',
    );

    public function testCreateGetRequest()
    {
        $curlService = new CurlService(self::$classes);

        $this->assertInstanceOf('CodeOasis\CurlBundle\Base\CurlGetRequest', $curlService->createGetRequest());
    }

    public function testCreatePostRequest()
    {
        $curlService = new CurlService(self::$classes);

        $this->assertInstanceOf('CodeOasis\CurlBundle\Base\CurlPostRequest', $curlService->createPostRequest());
    }

    public function testCreatePutRequest()
    {
        $curlService = new CurlService(self::$classes);

        $this->assertInstanceOf('CodeOasis\CurlBundle\Base\CurlPutRequest', $curlService->createPutRequest());
    }
}
