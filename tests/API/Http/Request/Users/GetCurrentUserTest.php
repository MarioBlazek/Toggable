<?php

namespace Marek\Toggable\Tests\API\Http\Request\Users;

use Marek\Toggable\API\Http\Request\Users\GetCurrentUser;
use Symfony\Component\Yaml\Exception\RuntimeException;

class GetCurrentUserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetCurrentUser
     */
    private $request;

    public function setUp()
    {
        $this->request = new GetCurrentUser(
            array(
                'relatedData' => true,
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testItGeneratesValidUri()
    {
        $this->assertEquals('me?with_related_data=true', $this->request->getUri());

        $request = new GetCurrentUser(array());
        $this->assertEquals('me', $request->getUri());
    }

    public function testGetDataShouldReturnNull()
    {
        $this->assertNull($this->request->getData());
    }

    /**
     * @expectedException RuntimeException
     */
    public function testJsonSerializeShouldThrowRuntimeException()
    {
        $this->request->jsonSerialize();
    }

    public function testItReturnsGetForMethod()
    {
        $this->assertEquals('GET', $this->request->getMethod());
    }
}
