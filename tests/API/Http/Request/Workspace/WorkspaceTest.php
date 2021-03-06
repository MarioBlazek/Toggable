<?php

namespace Marek\Toggable\Tests\API\Http\Request\Workspace;

use Marek\Toggable\API\Http\Request\Workspace\Workspace;

class WorkspaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Workspace
     */
    private $request;

    public function setUp()
    {
        $this->request = new Workspace(
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
        $this->assertEquals('workspaces/123', $this->request->getUri());
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
