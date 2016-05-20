<?php

namespace Marek\Toggable\Tests\Service\Workspace;

use Marek\Toggable\API\Http\Response\Workspace\WorkspaceClients;
use Marek\Toggable\API\Http\Response\Response;
use Marek\Toggable\API\Http\Response\Workspace\WorkspaceProjects;
use Marek\Toggable\API\Http\Response\Workspace\Workspaces;
use Marek\Toggable\API\Http\Response\Workspace\WorkspaceTags;
use Marek\Toggable\API\Http\Response\Workspace\WorkspaceTasks;
use Marek\Toggable\API\Http\Response\Workspace\WorkspaceUsers;
use Marek\Toggable\API\Toggl\Values\Client\Client;
use Marek\Toggable\API\Toggl\Values\Project\Project;
use Marek\Toggable\API\Toggl\Values\Tag\Tag;
use Marek\Toggable\API\Toggl\Values\Task\Task;
use Marek\Toggable\API\Toggl\Values\Workspace\User;
use Marek\Toggable\API\Toggl\Values\Workspace\Workspace;
use Marek\Toggable\Http\Manager\NativeRequestManager;
use Marek\Toggable\Hydrator\Workspace\WorkspaceHydrator;
use Marek\Toggable\Service\Workspace\WorkspaceService;

class WorkspaceServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testGetWorkspaces()
    {
        $data = array(
            'id' => 123,
            'name' => 'Test name',
        );

        $workspace = new Workspace($data);

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

        $hydrator = $this->getMockBuilder(WorkspaceHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($workspace);


        $workspaceService = new WorkspaceService($requestManager, $hydrator);

        $response = $workspaceService->getWorkspaces();

        $this->assertInstanceOf(Workspaces::class, $response);
    }

    public function testGetWorkspace()
    {
        $data = array(
            'id' => 123,
            'name' => 'Test name',
        );

        $workspace = new Workspace($data);

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

        $hydrator = $this->getMockBuilder(WorkspaceHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($workspace);


        $workspaceService = new WorkspaceService($requestManager, $hydrator);

        $response = $workspaceService->getWorkspace(123);

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\Workspace\Workspace::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetWorkspaceWithException()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(WorkspaceHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $workspaceService = new WorkspaceService($requestManager, $hydrator);

        $workspaceService->getWorkspace('test');
    }

    public function testGetWorkspaceUsers()
    {
        $data = array(
            'id' => 123,
            'admin' => true,
        );

        $user = new User($data);

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

        $hydrator = $this->getMockBuilder(WorkspaceHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->any())
            ->method('hydrate')
            ->willReturn($user);


        $workspaceService = new WorkspaceService($requestManager, $hydrator);

        $response = $workspaceService->getWorkspaceUsers(123);

        $this->assertInstanceOf(WorkspaceUsers::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetWorkspaceUsersWithException()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(WorkspaceHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $workspaceService = new WorkspaceService($requestManager, $hydrator);

        $workspaceService->getWorkspaceUsers('test');
    }

    public function testGetWorkspaceClients()
    {
        $data = array(
            'id' => 123,
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

        $hydrator = $this->getMockBuilder(WorkspaceHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->any())
            ->method('hydrate')
            ->willReturn($client);


        $workspaceService = new WorkspaceService($requestManager, $hydrator);

        $response = $workspaceService->getWorkspaceClients(123);

        $this->assertInstanceOf(WorkspaceClients::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetWorkspaceClientsWithException()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(WorkspaceHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $workspaceService = new WorkspaceService($requestManager, $hydrator);

        $workspaceService->getWorkspaceClients('test');
    }

    public function testGetWorkspaceProjects()
    {
        $data = array(
            'id' => 123,
            'name' => 'Test name',
        );

        $project = new Project($data);

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

        $hydrator = $this->getMockBuilder(WorkspaceHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->any())
            ->method('hydrate')
            ->willReturn($project);


        $workspaceService = new WorkspaceService($requestManager, $hydrator);

        $response = $workspaceService->getWorkspaceProjects(123);

        $this->assertInstanceOf(WorkspaceProjects::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetWorkspaceProjectsWithException()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(WorkspaceHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $workspaceService = new WorkspaceService($requestManager, $hydrator);

        $workspaceService->getWorkspaceProjects('test');
    }

    public function testGetWorkspaceTasks()
    {
        $data = array(
            'id' => 123,
            'name' => 'Test name',
        );

        $task = new Task($data);

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

        $hydrator = $this->getMockBuilder(WorkspaceHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->any())
            ->method('hydrate')
            ->willReturn($task);


        $workspaceService = new WorkspaceService($requestManager, $hydrator);

        $response = $workspaceService->getWorkspaceTasks(123);

        $this->assertInstanceOf(WorkspaceTasks::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetWorkspaceTasksWithException()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(WorkspaceHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $workspaceService = new WorkspaceService($requestManager, $hydrator);

        $workspaceService->getWorkspaceTasks('test');
    }

    public function testGetWorkspaceTags()
    {
        $data = array(
            'id' => 123,
            'name' => 'Test name',
        );

        $tag = new Tag($data);

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

        $hydrator = $this->getMockBuilder(WorkspaceHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->any())
            ->method('hydrate')
            ->willReturn($tag);

        $workspaceService = new WorkspaceService($requestManager, $hydrator);

        $response = $workspaceService->getWorkspaceTags(123);

        $this->assertInstanceOf(WorkspaceTags::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetWorkspaceTagsWithException()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(WorkspaceHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $workspaceService = new WorkspaceService($requestManager, $hydrator);

        $workspaceService->getWorkspaceTags('test');
    }

    public function testUpdateWorkspace()
    {
        $data = array(
            'id' => 123,
            'name' => 'Test name',
        );

        $workspace = new Workspace($data);

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

        $hydrator = $this->getMockBuilder(WorkspaceHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('extract')
            ->willReturn($data);

        $hydrator->expects($this->any())
            ->method('hydrate')
            ->willReturn($workspace);

        $workspaceService = new WorkspaceService($requestManager, $hydrator);

        $response = $workspaceService->updateWorkspace(123, $workspace);

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\Workspace\Workspace::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testUpdateWorkspaceWithException()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(WorkspaceHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $workspaceService = new WorkspaceService($requestManager, $hydrator);

        $workspaceService->updateWorkspace('test', new Workspace());
    }
}
