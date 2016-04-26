<?php

namespace Marek\Toggable\Tests\API\Http\Request\Project;

use Marek\Toggable\API\Http\Request\Project\GetProjectUsers;

class GetProjectUsersTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetProjectUsers
     */
    private $request;

    public function setUp()
    {
        $this->request = new GetProjectUsers(
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
        $this->assertEquals('projects/456/project_users', $this->request->getUri());
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
