<?php

namespace Marek\Toggable\Tests\API\Http\Response;

use Marek\Toggable\API\Http\Response\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testInstanceOf()
    {
        $request = new Response();
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Response\ResponseInterface', $request);
    }

    public function testGetBody()
    {
        $response = new Response(array('body' => 'body'));
        $this->assertEquals('body', $response->getBody());
    }

    public function testGetStatusCode()
    {
        $response = new Response(array('statusCode' => '404'));
        $this->assertEquals('404', $response->getStatusCode());
    }
}
