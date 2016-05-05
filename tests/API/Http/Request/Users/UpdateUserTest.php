<?php

namespace Marek\Toggable\Tests\API\Http\Request\Users;

use Marek\Toggable\API\Http\Request\Users\UpdateUser;

class UpdateUserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UpdateUser
     */
    private $request;

    public function setUp()
    {
        $this->request = new UpdateUser(
            array(
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
        $this->assertEquals('me', $this->request->getUri());
    }

    public function testGetData()
    {
        $this->assertEquals(array('data'), $this->request->getData());
    }

    public function testJsonSerialize()
    {
        $this->assertEquals(array('user' => array('data')), $this->request->jsonSerialize());
    }

    public function testItReturnsPutForMethod()
    {
        $this->assertEquals('PUT', $this->request->getMethod());
    }
}
