<?php

namespace Marek\Toggable\Tests\API\Http\Request\Users;

use Marek\Toggable\API\Http\Request\Users\SignUp;

class SignUpTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SignUp
     */
    private $request;

    public function setUp()
    {
        $this->request = new SignUp(
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
        $this->assertEquals('signups', $this->request->getUri());
    }

    public function testGetData()
    {
        $this->assertEquals(array('data'), $this->request->getData());
    }

    public function testJsonSerialize()
    {
        $this->assertEquals(array('user' => array('data')), $this->request->jsonSerialize());
    }

    public function testItReturnsPostForMethod()
    {
        $this->assertEquals('POST', $this->request->getMethod());
    }
}
