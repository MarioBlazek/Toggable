<?php

namespace Marek\Toggable\Tests\API\Http\Request\ProjectUsers;

use Marek\Toggable\API\Http\Request\ProjectUsers\CreateMultipleProjectUsers;

class CreateMultipleProjectUsersTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CreateMultipleProjectUsers
     */
    private $request;

    public function setUp()
    {
        $this->request = new CreateMultipleProjectUsers(
            array(
                'projectId' => 123,
                'userIds' => array(1, 2, 3, 4, 5),
                'data' => array('data'),
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testItReturnsPostForMethod()
    {
        $this->assertEquals('POST', $this->request->getMethod());
    }

    public function testGetData()
    {
        $this->assertEquals(array('data'), $this->request->getData());
    }

    public function testItImplementesSerializeMethod()
    {
        $this->assertEquals(array('project_user' => array('data')), $this->request->jsonSerialize());
    }

    public function testGetUri()
    {
        $this->assertEquals('project_users', $this->request->getUri());
    }
}
