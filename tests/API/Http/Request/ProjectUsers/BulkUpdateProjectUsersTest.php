<?php

namespace Marek\Toggable\Tests\API\Http\Request\ProjectUsers;

use Marek\Toggable\API\Http\Request\ProjectUsers\BulkUpdateProjectUsers;

class BulkUpdateProjectUsersTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BulkUpdateProjectUsers
     */
    private $request;

    public function setUp()
    {
        $this->request = new BulkUpdateProjectUsers(
            array(
                'projectUserIds' => array(1,2,3),
                'data' => array('data'),
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testItReturnsPutForMethod()
    {
        $this->assertEquals('PUT', $this->request->getMethod());
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
        $this->assertEquals('project_users/1,2,3', $this->request->getUri());
    }
}
