<?php

namespace Marek\Toggable\Tests\API\Http\Request\Project;

use Marek\Toggable\API\Http\Request\Project\CreateProject;

class CreateProjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CreateProject
     */
    private $request;

    public function setUp()
    {
        $this->request = new CreateProject(
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

    public function testGetData()
    {
        $this->assertEquals(array('data'), $this->request->getData());
    }

    public function testItImplementesSerializeMethod()
    {
        $this->assertEquals(array('project' => array('data')), $this->request->jsonSerialize());
    }

    public function testGetUri()
    {
        $this->assertEquals('projects', $this->request->getUri());
    }
}
