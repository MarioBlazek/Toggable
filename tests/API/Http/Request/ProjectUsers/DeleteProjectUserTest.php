<?php

namespace Marek\Toggable\Tests\API\Http\Request\ProjectUsers;

use Marek\Toggable\API\Http\Request\ProjectUsers\DeleteProjectUser;

class DeleteProjectUserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DeleteProjectUser
     */
    private $request;

    public function setUp()
    {
        $this->request = new DeleteProjectUser(
            array(
                'projectUserId' => 123,
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testItReturnsDeleteForMethod()
    {
        $this->assertEquals('DELETE', $this->request->getMethod());
    }

    public function testGetDataReturnsNull()
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

    public function testItGeneratesValidUri()
    {
        $this->assertEquals('project_users/123', $this->request->getUri());
    }
}
