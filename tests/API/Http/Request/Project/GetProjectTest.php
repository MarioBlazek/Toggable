<?php

namespace Marek\Toggable\Tests\API\Http\Request\Project;

use Marek\Toggable\API\Http\Request\Project\GetProject;

class GetProjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetProject
     */
    private $request;

    public function setUp()
    {
        $this->request = new GetProject(
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

    public function testGeneratesProperUri()
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
