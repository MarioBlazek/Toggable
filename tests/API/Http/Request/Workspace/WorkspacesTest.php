<?php

namespace Marek\Toggable\Tests\API\Http\Request\Workspace;

use Marek\Toggable\API\Http\Request\Workspace\Workspaces;

class WorkspacesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Workspaces
     */
    private $request;

    public function setUp()
    {
        $this->request = new Workspaces();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testItGeneratesValidUri()
    {
        $this->assertEquals('workspaces', $this->request->getUri());
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

    /**
     * @expectedException \Marek\Toggable\API\Exception\PropertyNotFoundException
     */
    public function testThrowPropertyNotFoundException()
    {
        $request = new Workspaces(array('testProperty' => 123));
    }
}
