<?php

namespace Marek\Toggable\Tests\API\Http\Request;

use Marek\Toggable\API\Http\Request\Request;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    public function testInstanceOf()
    {
        $request = new Request();
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $request);
    }

    public function testGetMethod()
    {
        $request = new Request(array('method' => Request::GET));
        $this->assertEquals('GET', $request->getMethod());
    }

    public function testGetUriMethod()
    {
        $request = new Request(array('uri' => 'test'));
        $this->assertEquals('test', $request->getUri());
    }

    public function testGetDataMethod()
    {
        $request = new Request(array('data' => array('data')));
        $this->assertEquals(array('data'), $request->getData());
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testItThrowsNotImplemetedException()
    {
        $request = new Request();
        $request->jsonSerialize();
    }
}
