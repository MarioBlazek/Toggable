<?php

namespace Marek\Toggable\Tests\API\Http\Request\WorkspaceUsers;

use Marek\Toggable\API\Http\Request\WorkspaceUsers\DeleteWorkspaceUser;

class DeleteWorkspaceUserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DeleteWorkspaceUser
     */
    private $request;

    public function setUp()
    {
        $this->request = new DeleteWorkspaceUser(
            array(
                'workspaceUserId' => 123,
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testItGeneratesValidUri()
    {
        $this->assertEquals('workspace_users/123', $this->request->getUri());
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

    public function testItReturnsDeleteForMethod()
    {
        $this->assertEquals('DELETE', $this->request->getMethod());
    }
}
