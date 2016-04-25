<?php

namespace Marek\Toggable\Tests\API\Http\Request\Client;

use Marek\Toggable\API\Http\Request\Client\UpdateClient;

class UpdateClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UpdateClient
     */
    private $request;

    public function setUp()
    {
        $this->request = new UpdateClient(
            array(
                'clientId' => 456,
                'data' => array('data'),
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testItReturnsPutForMethod()
    {
        $this->assertEquals('PUT', $this->request->getMethod());
    }

    public function testGetUri()
    {
        $this->assertEquals('clients/456', $this->request->getUri());
    }

    public function testGetData()
    {
        $this->assertEquals(array('data'), $this->request->getData());
    }

    public function testSerializeMethod()
    {
        $this->assertEquals(array('client' => array('data')), $this->request->jsonSerialize());
    }
}
