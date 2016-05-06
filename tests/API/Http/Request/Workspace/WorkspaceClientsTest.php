<?php

namespace Marek\Toggable\Tests\API\Http\Request\Workspace;

use Marek\Toggable\API\Http\Request\Workspace\WorkspaceClients;

class WorkspaceClientsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var WorkspaceClients
     */
    private $request;

    public function setUp()
    {
        $this->request = new WorkspaceClients(
            array(
                'workspaceId' => 123,
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testItGeneratesValidUri()
    {
        $this->assertEquals('workspaces/123/clients', $this->request->getUri());
    }

    public function testGetDataShouldReturnNull()
    {
        $this->assertNull($this->request->getData());
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testJsonSerializeShouldThrowRuntimeException()
    {
        $this->request->jsonSerialize();
    }

    public function testItReturnsGetForMethod()
    {
        $this->assertEquals('GET', $this->request->getMethod());
    }
}
