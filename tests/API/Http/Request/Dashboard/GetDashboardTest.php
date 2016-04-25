<?php

namespace Marek\Toggable\Tests\API\Http\Request\Dashboard;

use Marek\Toggable\API\Http\Request\Dashboard\GetDashboard;

class GetDashboardTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetDashboard
     */
    private $request;

    public function setUp()
    {
        $this->request = new GetDashboard(
            array(
                'workspaceId' => 123,
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testGetMethodReturnsGet()
    {
        $this->assertEquals('GET', $this->request->getMethod());
    }

    public function testGetDataShouldReturnNull()
    {
        $this->assertNull($this->request->getData());
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testJsonSerializeShouldThrowException()
    {
        $this->request->jsonSerialize();
    }

    public function testItGeneratesProperUri()
    {
        $this->assertEquals('dashboard/123', $this->request->getUri());
    }
}
