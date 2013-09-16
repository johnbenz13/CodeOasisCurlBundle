<?php

namespace CodeOasis\CurlBundle\Tests\Base;

class CurlRequestTest extends \PHPUnit_Framework_TestCase
{
    static public $curlInitStatus = true;
    static public $curlExecBody = '<html></html>';
    static public $curlInfo = array('http_code' => 200);

    public function setUp()
    {
        self::$curlInitStatus = true;
        self::$curlExecBody = '<html></html>';
        self::$curlInfo = array('http_code' => 200);
    }

    public function testExecuteWithFailedCurlInit()
    {
        self::$curlInitStatus = false;
        $curlRequest = $this->getCurlRequest();
        $curlRequest->setUrl('http://www.google.com');

        $this->setExpectedException('CodeOasis\CurlBundle\Exceptions\UnableToInitializeException');

        $curlRequest->execute();
    }

    public function testExecuteWithEmptyBody()
    {
        self::$curlExecBody = '';

        $curlRequest = $this->getCurlRequest();
        $curlRequest->setUrl('http://www.google.com');

        $curlRequest->expects($this->once())
                    ->method('doExecute');

        $this->setExpectedException('CodeOasis\CurlBundle\Exceptions\EmptyResponseException');

        $curlRequest->execute();
    }

    public function testExecuteWithEmptyInfo()
    {
        self::$curlInfo = array();

        $curlRequest = $this->getCurlRequest();
        $curlRequest->setUrl('http://www.google.com');

        $curlRequest->expects($this->once())
                    ->method('doExecute');

        $this->setExpectedException('CodeOasis\CurlBundle\Exceptions\EmptyResponseException');

        $curlRequest->execute();
    }

    public function testExecuteWithoutSettingUrl()
    {
        $curlRequest = $this->getCurlRequest();

        $curlRequest->expects($this->never())
                    ->method('doExecute');

        $this->setExpectedException('\InvalidArgumentException');

        $curlRequest->execute();
    }

    public function testExecuteWithResponse()
    {
        $curlRequest = $this->getCurlRequest();
        $curlRequest->setUrl('http://www.google.com');

        $this->assertEquals($curlRequest->execute(), $curlRequest);
    }

    private function getCurlRequest()
    {
        return $this->getMockForAbstractClass('CodeOasis\CurlBundle\Base\CurlRequest');
    }
}

/**
 * Mocks php global functions
 */
namespace CodeOasis\CurlBundle\Base;

function curl_init()
{
    return \CodeOasis\CurlBundle\Tests\Base\CurlRequestTest::$curlInitStatus;
}

function curl_exec()
{
    return \CodeOasis\CurlBundle\Tests\Base\CurlRequestTest::$curlExecBody;
}

function curl_setopt(){}

function curl_getinfo()
{
    return \CodeOasis\CurlBundle\Tests\Base\CurlRequestTest::$curlInfo;
}

function curl_close(){}

namespace CodeOasis\CurlBundle\Exceptions;

function curl_error(){}
