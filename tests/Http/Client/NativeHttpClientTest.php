<?php

namespace Marek\Toggable\Tests\Http\Client;

use Marek\Toggable\API\Http\Request\RequestInterface;
use Marek\Toggable\API\Http\Response\ResponseInterface;
use Marek\Toggable\API\Security\TokenInterface;
use Marek\Toggable\Http\Client\HttpClientInterface;
use Marek\Toggable\Http\Client\NativeHttpClient;
use Marek\Toggable\Http\Converter\ArgumentsConverterInterface;
use Marek\Toggable\Http\Converter\NativeArgumentsConverter;
use Marek\Toggable\Http\Parser\HttpResponseParserInterface;
use Marek\Toggable\Http\Parser\NativeResponseParser;

class NativeHttpClientTest extends \PHPUnit_Framework_TestCase
{
    public function testInstanceOf()
    {
        $uri = 'http://www.valid-uri.com';
        $token = $this->getMockForAbstractClass(TokenInterface::class);
        $converter = $this->getMockForAbstractClass(ArgumentsConverterInterface::class);
        $parser = $this->getMockForAbstractClass(HttpResponseParserInterface::class);
        $client = new NativeHttpClient($uri, $token, $converter, $parser);

        $this->assertInstanceOf(HttpClientInterface::class, $client);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testItThrowsExceptionIfUriIsInvalid()
    {
        $uri = 'invalid-uri.com';
        $token = $this->getMockForAbstractClass(TokenInterface::class);
        $converter = $this->getMockForAbstractClass(ArgumentsConverterInterface::class);
        $parser = $this->getMockForAbstractClass(HttpResponseParserInterface::class);
        $client = new NativeHttpClient($uri, $token, $converter, $parser);
    }

    public function testPrepareMethod()
    {
        $uri = 'http://www.valid-uri.com';
        $token = $this->getMockForAbstractClass(TokenInterface::class);
        $request = $this->getMockForAbstractClass(RequestInterface::class);
        $converter = $this->getMockBuilder(NativeArgumentsConverter::class)
            ->disableOriginalConstructor()
            ->getMock();

        $converter->expects($this->once())
            ->method('convert');

        $parser = $this->getMockForAbstractClass(HttpResponseParserInterface::class);

        $client = new NativeHttpClient($uri, $token, $converter, $parser);


        $client->prepare($request);
    }

    public function testGetResponseMethod()
    {
        $data = array(
            'data' => '{"client": {"name": "Test"}}',
            'metadata' => array(
                'HTTP/1.1 200 OK'
            ),
        );

        $uri = 'http://www.valid-uri.com';
        $token = $this->getMockForAbstractClass(TokenInterface::class);
        $response = $this->getMockForAbstractClass(ResponseInterface::class);
        $converter = $this->getMockForAbstractClass(ArgumentsConverterInterface::class);

        $parser = $this->getMockBuilder(NativeResponseParser::class)
            ->disableOriginalConstructor()
            ->setMethods(array('parse'))
            ->getMock();

        $parser->expects($this->once())
            ->method('parse')
            ->willReturn($response);

        $clientMock = $this->getMockBuilder(NativeHttpClient::class)
            ->setConstructorArgs(array($uri, $token, $converter, $parser))
            ->setMethods(array('send'))
            ->getMock();
        
        $clientMock->expects($this->once())
            ->method('send')
            ->willReturn($data);

        $response = $clientMock->getResponse();

        $this->assertInstanceOf(ResponseInterface::class, $response);
    }
}
