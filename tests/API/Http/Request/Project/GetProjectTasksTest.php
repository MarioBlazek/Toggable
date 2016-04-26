<?php

namespace Marek\Toggable\Tests\API\Http\Request\Project;

use Marek\Toggable\API\Http\Request\Project\GetProjectTasks;

class GetProjectTasksTests extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetProjectTasks
     */
    private $request;

    public function setUp()
    {
        $this->request = new GetProjectTasks(
            array(
                'projectId' => 456,
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testItReturnsGetForMethod()
    {
        $this->assertEquals('GET', $this->request->getMethod());
    }

    public function testItGeneratesValidUri()
    {
        $this->assertEquals('projects/456/tasks', $this->request->getUri());
    }

    public function testItReturnsNullForData()
    {
        $this->assertNull($this->request->getData());
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testItThrowsRuntimeException()
    {
        $this->request->jsonSerialize();
    }
}
