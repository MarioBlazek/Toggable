<?php

namespace Marek\Toggable\Tests\API\Http\Request\WorkspaceUsers;

use Marek\Toggable\API\Http\Request\WorkspaceUsers\InviteUserToWorkspace;

class InviteUserToWorkspaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var InviteUserToWorkspace
     */
    private $request;

    public function setUp()
    {
        $this->request = new InviteUserToWorkspace(
            array(
                'workspaceId' => 123,
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
        $this->assertEquals('workspaces/123/invite', $this->request->getUri());
    }

    public function testGetData()
    {
        $this->assertEquals(array('data'), $this->request->getData());
    }

    public function testJsonSerialize()
    {
        $this->assertEquals(array('emails' => array('data')), $this->request->jsonSerialize());
    }

    public function testItReturnsGetForMethod()
    {
        $this->assertEquals('GET', $this->request->getMethod());
    }
}
