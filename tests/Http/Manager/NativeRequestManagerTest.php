<?php

namespace Marek\Toggable\Tests\API\Manager;

use Marek\Toggable\API\Exception\Http\BaseException;
use Marek\Toggable\API\Http\Request\Request;
use Marek\Toggable\API\Http\Response\Response;
use Marek\Toggable\API\Http\Response\ResponseInterface;
use Marek\Toggable\Http\Client\NativeHttpClient;
use Marek\Toggable\Http\Manager\NativeRequestManager;

class NativeRequestManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testInstanceOf()
    {
        $client = $this->getMockForAbstractClass('Marek\Toggable\Http\Client\HttpClientInterface');
        $this->assertInstanceOf('Marek\Toggable\Http\Manager\RequestManagerInterface', new NativeRequestManager($client));
    }

    public function testRequestMethod()
    {
        $client = $this->getMockBuilder(NativeHttpClient::class)
            ->disableOriginalConstructor()
            ->setMethods(array('prepare', 'getResponse'))
            ->getMock();

        $response = $this->getMockBuilder(Response::class)
            ->disableOriginalConstructor()
            ->setMethods(array())
            ->getMock();

        $request = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->setMethods(array())
            ->getMock();

        $client->expects($this->once())
            ->method('prepare');

        $client->expects($this->once())
            ->method('getResponse')
            ->willReturn($response);

        $requestManager = new NativeRequestManager($client);
        $responseResult = $requestManager->request($request);

        $this->assertInstanceOf(ResponseInterface::class, $responseResult);
        $this->assertSame($response, $responseResult);
    }

    /**
     * @expectedException \Marek\Toggable\API\Exception\NotFoundException
     */
    public function testRequestMethodWithException()
    {
        $client = $this->getMockBuilder(NativeHttpClient::class)
            ->disableOriginalConstructor()
            ->getMock();

        $request = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->setMethods(array())
            ->getMock();

        $client->expects($this->once())
            ->method('getResponse')
            ->willThrowException(new BaseException('test'));

        $requestManager = new NativeRequestManager($client);

        $requestManager->request($request);
    }
}
