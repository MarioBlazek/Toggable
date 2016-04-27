<?php

namespace Marek\Toggable\Tests\API\Http\Request\ProjectUsers;

use Marek\Toggable\API\Http\Request\ProjectUsers\UpdateProjectUser;

class UpdateProjectUserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UpdateProjectUser
     */
    private $request;

    public function setUp()
    {
        $this->request = new UpdateProjectUser(
            array(
                'projectUserId' => 123,
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
        $this->assertEquals('project_users/123', $this->request->getUri());
    }
}
