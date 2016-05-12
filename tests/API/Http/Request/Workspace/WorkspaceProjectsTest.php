<?php

namespace Marek\Toggable\Tests\API\Http\Request\Workspace;

use Marek\Toggable\API\Http\Request\Workspace\WorkspaceProjects;

class WorkspaceProjectsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var WorkspaceProjects
     */
    private $request;

    public function setUp()
    {
        $this->request = new WorkspaceProjects(
            array(
                'workspaceId'   => 123,
                'active'        => true,
                'actualHours'   => true,
                'onlyTemplates' => true,
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testItGeneratesValidUri()
    {
        $this->assertEquals('workspaces/123/projects?active=true&actual_hours=true&only_templates=true', $this->request->getUri());

        $request = new WorkspaceProjects(
            array(
                'workspaceId'   => 123,
                'active'        => false,
                'actualHours'   => false,
                'onlyTemplates' => false,
            )
        );

        $this->assertEquals('workspaces/123/projects?active=false&actual_hours=false&only_templates=false', $request->getUri());
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
