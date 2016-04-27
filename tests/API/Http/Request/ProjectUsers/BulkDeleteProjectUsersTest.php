<?php

namespace Marek\Toggable\Tests\API\Http\Request\ProjectUsers;

use Marek\Toggable\API\Http\Request\ProjectUsers\BulkDeleteProjectUsers;

class BulkDeleteProjectUsersTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BulkDeleteProjectUsers
     */
    private $request;

    public function setUp()
    {
        $this->request = new BulkDeleteProjectUsers(
            array(
                'projectUserIds' => array(1,2,3),
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

    public function testGetDataShouldReturnNull()
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

    public function testGetUri()
    {
        $this->assertEquals('project_users/1,2,3', $this->request->getUri());
    }
}
