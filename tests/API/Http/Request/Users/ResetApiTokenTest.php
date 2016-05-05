<?php

namespace Marek\Toggable\Tests\API\Http\Request\Users;

use Marek\Toggable\API\Http\Request\Users\ResetApiToken;

class ResetApiTokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ResetApiToken
     */
    private $request;

    public function setUp()
    {
        $this->request = new ResetApiToken();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testItGeneratesValidUri()
    {
        $this->assertEquals('reset_token', $this->request->getUri());
    }

    public function testGetDataShouldReturnNull()
    {
        $this->assertNull($this->request->getData());
    }

    /**
     * @expectedException RuntimeException
     */
    public function testJsonSerializeShouldThrowRuntimeException()
    {
        $this->request->jsonSerialize();
    }

    public function testItReturnsPostForMethod()
    {
        $this->assertEquals('POST', $this->request->getMethod());
    }
}
