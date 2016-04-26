<?php

namespace Marek\Toggable\Tests\API\Http\Request\Project;

use Marek\Toggable\API\Http\Request\Project\DeleteProject;

class DeleteProjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DeleteProject
     */
    private $request;

    public function setUp()
    {
        $this->request = new DeleteProject(
            array(
                'projectId' => 456,
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testItReturnsDeleteForMethod()
    {
        $this->assertEquals('DELETE', $this->request->getMethod());
    }

    public function testItGeneratesValidUri()
    {
        $this->assertEquals('projects/456', $this->request->getUri());
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
