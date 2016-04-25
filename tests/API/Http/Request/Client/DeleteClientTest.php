<?php

namespace Marek\Toggable\Tests\API\Http\Request\Client;

use Marek\Toggable\API\Http\Request\Client\DeleteClient;

class DeleteClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DeleteClient
     */
    private $request;

    public function setUp()
    {
        $this->request = new DeleteClient(array('clientId' => 456));
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testItReturnsDeleteForMethod()
    {
        $this->assertEquals('DELETE', $this->request->getMethod());
    }

    public function testGetUri()
    {
        $this->assertEquals('clients/456', $this->request->getUri());
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
