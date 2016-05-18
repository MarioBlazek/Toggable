<?php

namespace Marek\Toggable\Tests\Service\Client;

use Marek\Toggable\API\Http\Response\Response;
use Marek\Toggable\API\Http\Response\ResponseInterface;
use Marek\Toggable\API\Toggl\Values\Client\Client;
use Marek\Toggable\API\Toggl\Values\Project\Project;
use Marek\Toggable\Http\Manager\NativeRequestManager;
use Marek\Toggable\Hydrator\Client\ClientHydrator;
use Marek\Toggable\Service\Client\ClientService;

class ClientServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateClient()
    {
        $data = array(
            'wid' => 123,
            'name' => 'Test name',
        );

        $client = new Client($data);

        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        'Test'
                    ),
                ),
            )
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $requestManager->expects($this->once())
            ->method('request')
            ->willReturn($response);

        $hydrator = $this->getMockBuilder(ClientHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('extract')
            ->willReturn(array());

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($client);


        $clientService = new ClientService($requestManager, $hydrator);

        $response = $clientService->createClient($client);

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\Client\Client::class, $response);
    }

    public function testGetClientDetails()
    {
        $data = array(
            'wid' => 123456,
            'name' => 'Test name',
        );

        $client = new Client($data);

        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        'Test'
                    ),
                ),
            )
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $requestManager->expects($this->once())
            ->method('request')
            ->willReturn($response);

        $hydrator = $this->getMockBuilder(ClientHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($client);


        $clientService = new ClientService($requestManager, $hydrator);

        $response = $clientService->getClientDetails(123456);

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\Client\Client::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetClientDetailsWithInvalidClientId()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(ClientHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate'))
            ->getMock();

        $clientService = new ClientService($requestManager, $hydrator);

        $response = $clientService->getClientDetails('test');
    }

    public function testGetClients()
    {
        $data = array(
            'wid' => 123456,
            'name' => 'Test name',
        );

        $client = new Client($data);

        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        'Test'
                    ),
                ),
            )
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $requestManager->expects($this->once())
            ->method('request')
            ->willReturn($response);

        $hydrator = $this->getMockBuilder(ClientHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($client);


        $clientService = new ClientService($requestManager, $hydrator);

        $response = $clientService->getClients();

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\Client\Clients::class, $response);
    }

    public function testGetClientProjects()
    {
        $project = new Project();

        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        'Test'
                    ),
                ),
            )
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $requestManager->expects($this->once())
            ->method('request')
            ->willReturn($response);

        $hydrator = $this->getMockBuilder(ClientHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate'))
            ->getMock();

        $hydrator->expects($this->any())
            ->method('hydrate')
            ->willReturn($project);


        $clientService = new ClientService($requestManager, $hydrator);

        $response = $clientService->getClientProjects(123456, 'true');

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\Project\Projects::class, $response);
    }

    public function testUpdateClient()
    {
        $data = array(
            'wid' => 123456,
            'name' => 'Test name',
        );

        $client = new Client($data);

        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        'Test'
                    ),
                ),
            )
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $requestManager->expects($this->once())
            ->method('request')
            ->willReturn($response);

        $hydrator = $this->getMockBuilder(ClientHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('extract')
            ->willReturn(array());

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($client);


        $clientService = new ClientService($requestManager, $hydrator);

        $response = $clientService->updateClient(123456, $client);

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\Client\Client::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testUpdateClientWithInvalidClientId()
    {
        $data = array(
            'wid' => 123456,
            'name' => 'Test name',
        );

        $client = new Client($data);

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(ClientHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $clientService = new ClientService($requestManager, $hydrator);

        $clientService->updateClient('test', $client);
    }

    public function testDeleteClient()
    {
        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        'Test'
                    ),
                ),
            )
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $requestManager->expects($this->once())
            ->method('request')
            ->willReturn($response);

        $hydrator = $this->getMockBuilder(ClientHydrator::class)
            ->disableOriginalConstructor()
            ->getMock();


        $clientService = new ClientService($requestManager, $hydrator);

        $response = $clientService->deleteClient(123456);

        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testDeleteClientWithInvalidClientId()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $hydrator = $this->getMockBuilder(ClientHydrator::class)
            ->disableOriginalConstructor()
            ->getMock();


        $clientService = new ClientService($requestManager, $hydrator);

        $clientService->deleteClient('test');
    }
}
