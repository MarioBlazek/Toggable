<?php

namespace Marek\Toggable\Tests\API\Http\Request\Client;

use Marek\Toggable\API\Http\Request\Client\GetClientProjects;

class GetClientProjectsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetClientProjects
     */
    private $request;

    public function setUp()
    {
        $this->request = new GetClientProjects(
            array(
                'clientId' => 456,
                'active'   => 'true',
            )
        );
    }

    public function testItReturnsGetForMethod()
    {
        $this->assertEquals('GET', $this->request->getMethod());
    }

    public function testItGeneratesValidUri()
    {
        $this->assertEquals('clients/456/projects?active=true', $this->request->getUri());
    }

    public function testGetDataShouldReturnNull()
    {
        $this->assertNull($this->request->getData());
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testSerializeMethodNotImplemented()
    {
        $this->request->jsonSerialize();
    }
}
