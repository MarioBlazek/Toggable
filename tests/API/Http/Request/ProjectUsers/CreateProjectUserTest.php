<?php

namespace Marek\Toggable\Tests\API\Http\Request\ProjectUsers;

use Marek\Toggable\API\Http\Request\ProjectUsers\CreateProjectUser;

class CreateProjectUserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CreateProjectUser
     */
    private $request;

    public function setUp()
    {
        $this->request = new CreateProjectUser(
            array(
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
