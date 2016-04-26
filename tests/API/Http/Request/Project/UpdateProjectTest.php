<?php

namespace Marek\Toggable\Tests\API\Http\Request\Project;

use Marek\Toggable\API\Http\Request\Project\UpdateProject;

class UpdateProjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UpdateProject
     */
    private $request;

    public function setUp()
    {
        $this->request = new UpdateProject(
            array(
                'projectId' => 456,
                'data' => array('data'),
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testItGeneratesValidUri()
    {
        $this->assertEquals('projects/456', $this->request->getUri());
    }

    public function testItReturnsPutForMethod()
    {
        $this->assertEquals('PUT', $this->request->getMethod());
    }

    public function testGetData()
    {
        $this->assertEquals(array('data'), $this->request->getData());
    }

    public function testJsonSerializeMethod()
    {
        $this->assertEquals(array('project' => array('data')), $this->request->jsonSerialize());
    }
}
