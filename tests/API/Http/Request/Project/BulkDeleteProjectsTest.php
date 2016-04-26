<?php

namespace Marek\Toggable\Tests\API\Http\Request\Project;

use Marek\Toggable\API\Http\Request\Project\BulkDeleteProjects;

class BulkDeleteProjectsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BulkDeleteProjects
     */
    private $request;

    public function setUp()
    {
        $this->request = new BulkDeleteProjects(
            array(
                'projectsIds' => array(1,2,3,4),
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

    public function testItGeneratesValidUri()
    {
        $this->assertEquals('projects/1,2,3,4', $this->request->getUri());
    }
}
