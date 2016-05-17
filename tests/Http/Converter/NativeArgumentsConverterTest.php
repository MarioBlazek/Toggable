<?php

namespace Marek\Toggable\Tests\Http\Converter;

use Marek\Toggable\Http\Converter\NativeArgumentsConverter;

class NativeArgumentsConverterTest extends \PHPUnit_Framework_TestCase
{
    public function testInstanceOf()
    {
        $this->assertInstanceOf('Marek\Toggable\Http\Converter\ArgumentsConverterInterface', new NativeArgumentsConverter());
    }

    public function testConversion()
    {
        $request = $this->getMockBuilder('Marek\Toggable\API\Http\Request\RequestInterface')
            ->getMock();
        $request->expects($this->once())
            ->method('getMethod');
        $request->expects($this->once())
            ->method('jsonSerialize');
        $request->expects($this->once())
            ->method('getUri');
        $request->expects($this->once())
            ->method('getData')
            ->willReturn(array('data'));

        $token = $this->getMockForAbstractClass('Marek\Toggable\API\Security\TokenInterface');
        $token->expects($this->once())
            ->method('getAuthentication');

        $uri = 'some_uri';

        $converter = new NativeArgumentsConverter();
        $result = $converter->convert($request, $token, $uri);

        $this->assertTrue(is_array($result));
    }
}
