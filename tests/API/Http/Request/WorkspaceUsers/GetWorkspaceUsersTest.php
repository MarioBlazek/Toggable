<?php

namespace Marek\Toggable\Tests\API\Http\Request\WorkspaceUsers;

use Marek\Toggable\API\Http\Request\WorkspaceUsers\GetWorkspaceUsers;

class GetWorkspaceUsersTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetWorkspaceUsers
     */
    private $request;

    public function setUp()
    {
        $this->request = new GetWorkspaceUsers(
            array(
                'workspaceId' => 123,
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testItGeneratesValidUri()
    {
        $this->assertEquals('workspaces/123/workspace_users', $this->request->getUri());
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
