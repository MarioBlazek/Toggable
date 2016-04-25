<?php

namespace Marek\Toggable\Tests\API\Http\Request\Client;

use Marek\Toggable\API\Http\Request\Client\GetClients;

class GetClientsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetClients
     */
    private $request;

    public function setUp()
    {
        $this->request = new GetClients();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testItReturnsGetForMethod()
    {
        $this->assertEquals('GET', $this->request->getMethod());
    }

    public function testGetUri()
    {
        $this->assertEquals('clients', $this->request->getUri());
    }

    public function testGetDataShouldReturnNull()
    {
        $this->assertNull($this->request->getData());
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testSerializeMethodNotImplemented()
    {
        $this->request->jsonSerialize();
    }
}
