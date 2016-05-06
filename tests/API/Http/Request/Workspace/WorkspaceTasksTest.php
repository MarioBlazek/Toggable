<?php

namespace Marek\Toggable\Tests\API\Http\Request\Workspace;

use Marek\Toggable\API\Http\Request\Workspace\WorkspaceTasks;

class WorkspaceTasksTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var WorkspaceTasks
     */
    private $request;

    public function setUp()
    {
        $this->request = new WorkspaceTasks(
            array(
                'workspaceId' => 123,
                'active' => true,
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testItGeneratesValidUri()
    {
        $this->assertEquals('workspaces/123/tasks?active=true', $this->request->getUri());
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
