<?php

namespace Marek\Toggable\Tests\Http\Parser;

use Marek\Toggable\API\Http\Response\ResponseInterface;
use Marek\Toggable\Http\Parser\HttpResponseParserInterface;
use Marek\Toggable\Http\Parser\NativeResponseParser;

class NativeResponseParserTest extends \PHPUnit_Framework_TestCase
{
    public function testInstanceOf()
    {
        $this->assertInstanceOf(HttpResponseParserInterface::class, new NativeResponseParser());
    }

    public function testParseMethod()
    {
        $data = array(
            'data' => '{"client": {"name": "Test"}}',
            'metadata' => array(
                'HTTP/1.1 200 OK'
            ),
        );

        $parser = new NativeResponseParser();
        
        $response = $parser->parse($data);

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(array('client' => array('name' => 'Test')), $response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testParseMethodWithInvalidInput()
    {
        $data = array(
            'data' => null,
            'metadata' => array(
                null
            ),
        );

        $parser = new NativeResponseParser();

        $response = $parser->parse($data);

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(null, $response->getBody());
        $this->assertEquals(null, $response->getStatusCode());
    }
}
