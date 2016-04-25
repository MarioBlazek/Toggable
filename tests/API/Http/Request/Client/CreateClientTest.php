<?php

namespace Marek\Toggable\Tests\API\Http\Request\Client;

use Marek\Toggable\API\Http\Request\Client\CreateClient;

class CreateClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CreateClient
     */
    private $request;

    public function setUp()
    {
        $this->request = new CreateClient(
            array(
                'data' => array('data'),
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testItReturnsPostForMethod()
    {
        $this->assertEquals('POST', $this->request->getMethod());
    }

    public function testGetUri()
    {
        $this->assertEquals('clients', $this->request->getUri());
    }

    public function testGetData()
    {
        $this->assertEquals(array('data'), $this->request->getData());
    }

    public function testSerializeMethodImplemented()
    {
        $this->assertEquals(array('client' => array('data')), $this->request->jsonSerialize());
    }
}
