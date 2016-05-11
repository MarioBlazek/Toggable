<?php

namespace Marek\Toggable\Tests\API\Http\Request\WorkspaceUsers;

use Marek\Toggable\API\Http\Request\WorkspaceUsers\UpdateWorkspaceUser;

class UpdateWorkspaceUserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UpdateWorkspaceUser
     */
    private $request;

    public function setUp()
    {
        $this->request = new UpdateWorkspaceUser(
            array(
                'workspaceUserId' => 123,
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
        $this->assertEquals('workspace_users/123', $this->request->getUri());
    }

    public function testGetData()
    {
        $this->assertEquals(array('data'), $this->request->getData());
    }

    public function testJsonSerialize()
    {
        $this->assertEquals(array('workspace_user' => array('data')), $this->request->jsonSerialize());
    }

    public function testItReturnsPutForMethod()
    {
        $this->assertEquals('PUT', $this->request->getMethod());
    }
}
