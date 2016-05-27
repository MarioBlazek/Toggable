<?php

namespace Marek\Toggable\Tests\Service\ProjectUsers;

use Marek\Toggable\API\Http\Response\ProjectUsers\ProjectUser;
use Marek\Toggable\API\Http\Response\ProjectUsers\ProjectUsers;
use Marek\Toggable\API\Http\Response\Response;
use Marek\Toggable\API\Http\Response\ResponseInterface;
use Marek\Toggable\API\Toggl\Values\Project\User;
use Marek\Toggable\Http\Manager\NativeRequestManager;
use Marek\Toggable\Hydrator\Project\UserHydrator;
use Marek\Toggable\Service\ProjectUsers\ProjectUsersService;

class ProjectUsersServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateProjectUser()
    {
        $data = array(
            'id' => 123,
            'pid' => 456,
            'uid' => 123456,
            'wid' => 654321,
            'fullname' => 'Test fullname',
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

        $hydrator = $this->getMockBuilder(UserHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('extract')
            ->willReturn($data);

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($user);


        $projectUsersService = new ProjectUsersService($requestManager, $hydrator);

        $response = $projectUsersService->createProjectUser($user);

        $this->assertInstanceOf(ProjectUser::class, $response);
    }

    public function testUpdateProjectUser()
    {
        $data = array(
            'id' => 123,
            'pid' => 456,
            'uid' => 123456,
            'wid' => 654321,
            'fullname' => 'Test fullname',
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

        $hydrator = $this->getMockBuilder(UserHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('extract')
            ->willReturn($data);

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($user);


        $projectUsersService = new ProjectUsersService($requestManager, $hydrator);

        $response = $projectUsersService->updateProjectUser(123, $user);

        $this->assertInstanceOf(ProjectUser::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testUpdateProjectUserWithException()
    {
        $data = array(
            'id' => 123,
            'pid' => 456,
            'uid' => 123456,
            'wid' => 654321,
            'fullname' => 'Test fullname',
        );

        $user = new User($data);

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(UserHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();


        $projectUsersService = new ProjectUsersService($requestManager, $hydrator);

        $projectUsersService->updateProjectUser('test', $user);
    }

    public function testDeleteProjectUser()
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

        $hydrator = $this->getMockBuilder(UserHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $projectUsersService = new ProjectUsersService($requestManager, $hydrator);

        $response = $projectUsersService->deleteProjectUser(123);

        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testDeleteProjectUserWithException()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(UserHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $projectUsersService = new ProjectUsersService($requestManager, $hydrator);

        $projectUsersService->deleteProjectUser('test');
    }

    public function testCreateMultipleProjectUsers()
    {
        $data = array(
            'id' => 123,
            'pid' => 456,
            'uid' => 123456,
            'wid' => 654321,
            'fullname' => 'Test fullname',
        );

        $userIds = array(1, 2, 3, 4, 5);

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

        $hydrator = $this->getMockBuilder(UserHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('extract')
            ->willReturn($data);

        $hydrator->expects($this->any())
            ->method('hydrate')
            ->willReturn($user);


        $projectUsersService = new ProjectUsersService($requestManager, $hydrator);

        $response = $projectUsersService->createMultipleProjectUsers(123, $userIds, $user);

        $this->assertInstanceOf(ProjectUsers::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCreateMultipleProjectUsersWithException()
    {
        $data = array(
            'id' => 123,
            'pid' => 456,
            'uid' => 123456,
            'wid' => 654321,
            'fullname' => 'Test fullname',
        );

        $userIds = array(1, 2, 3, 4, 5);

        $user = new User($data);

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(UserHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $projectUsersService = new ProjectUsersService($requestManager, $hydrator);

        $projectUsersService->createMultipleProjectUsers("test", $userIds, $user);
    }

    public function testUpdateMultipleProjectUsers()
    {
        $data = array(
            'id' => 123,
            'pid' => 456,
            'uid' => 123456,
            'wid' => 654321,
            'fullname' => 'Test fullname',
        );

        $user = new User($data);

        $projectUserIds = array(1123, 456, 789);

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

        $hydrator = $this->getMockBuilder(UserHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('extract')
            ->willReturn($data);

        $hydrator->expects($this->any())
            ->method('hydrate')
            ->willReturn($user);


        $projectUsersService = new ProjectUsersService($requestManager, $hydrator);

        $response = $projectUsersService->updateMultipleProjectUsers($projectUserIds, $user);

        $this->assertInstanceOf(ProjectUsers::class, $response);
    }

    public function testDeleteMultipleProjectUsers()
    {
        $projectUserIds = array(1123, 456, 789);

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

        $hydrator = $this->getMockBuilder(UserHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $projectUsersService = new ProjectUsersService($requestManager, $hydrator);

        $response = $projectUsersService->deleteMultipleProjectUsers($projectUserIds);

        $this->assertInstanceOf(ResponseInterface::class, $response);
    }
}
