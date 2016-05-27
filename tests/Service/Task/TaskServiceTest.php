<?php

namespace Marek\Toggable\Tests\Service\Task;

use Marek\Toggable\API\Http\Response\Response;
use Marek\Toggable\API\Http\Response\ResponseInterface;
use Marek\Toggable\API\Http\Response\Task\Task as TaskResponse;
use Marek\Toggable\API\Http\Response\Task\Tasks as TasksResponse;
use Marek\Toggable\API\Toggl\Values\Task\Task;
use Marek\Toggable\Http\Manager\NativeRequestManager;
use Marek\Toggable\Hydrator\Task\TaskHydrator;
use Marek\Toggable\Service\Task\TaskService;

class TaskServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateTask()
    {
        $data = array(
            'id' => 123,
            'pid' => 456,
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

        $hydrator = $this->getMockBuilder(TaskHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('extract')
            ->willReturn($data);

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($task);


        $taskService = new TaskService($requestManager, $hydrator);

        $response = $taskService->createTask($task);

        $this->assertInstanceOf(TaskResponse::class, $response);
    }

    public function testGetTask()
    {
        $data = array(
            'id' => 123,
            'pid' => 456,
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

        $hydrator = $this->getMockBuilder(TaskHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($task);

        $taskService = new TaskService($requestManager, $hydrator);

        $response = $taskService->getTask(123);

        $this->assertInstanceOf(TaskResponse::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetTaskWithException()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(TaskHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $taskService = new TaskService($requestManager, $hydrator);

        $taskService->getTask('test');
    }

    public function testUpdateTask()
    {
        $data = array(
            'id' => 123,
            'pid' => 456,
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

        $hydrator = $this->getMockBuilder(TaskHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('extract')
            ->willReturn($data);

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($task);

        $taskService = new TaskService($requestManager, $hydrator);

        $response = $taskService->updateTask(123, $task);

        $this->assertInstanceOf(TaskResponse::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testUpdateTaskWithException()
    {
        $data = array(
            'id' => 123,
            'pid' => 456,
            'name' => 'Test name',
        );

        $task = new Task($data);

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(TaskHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $taskService = new TaskService($requestManager, $hydrator);

        $response = $taskService->updateTask('test', $task);

        $this->assertInstanceOf(TaskResponse::class, $response);
    }

    public function testDeleteTask()
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

        $hydrator = $this->getMockBuilder(TaskHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $taskService = new TaskService($requestManager, $hydrator);

        $response = $taskService->deleteTask(123);

        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testDeleteTaskWithException()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(TaskHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $taskService = new TaskService($requestManager, $hydrator);

        $taskService->deleteTask('test');
    }

    public function testUpdateMultipleTasks()
    {
        $data = array(
            'id' => 123,
            'pid' => 456,
            'name' => 'Test name',
        );

        $taskIds = array(123, 456, 789);

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

        $hydrator = $this->getMockBuilder(TaskHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('extract')
            ->willReturn($data);

        $hydrator->expects($this->any())
            ->method('hydrate')
            ->willReturn($task);


        $taskService = new TaskService($requestManager, $hydrator);

        $response = $taskService->updateMultipleTasks($taskIds, $task);

        $this->assertInstanceOf(TasksResponse::class, $response);
    }

    public function testDeleteMultipleTasks()
    {
        $taskIds = array(123, 456, 789);

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

        $hydrator = $this->getMockBuilder(TaskHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $taskService = new TaskService($requestManager, $hydrator);

        $response = $taskService->deleteMultipleTasks($taskIds);

        $this->assertInstanceOf(ResponseInterface::class, $response);
    }
}
