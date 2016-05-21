<?php

namespace Marek\Toggable\Tests\Service\WorkspaceUsers;

use Marek\Toggable\API\Http\Response\Response;
use Marek\Toggable\API\Http\Response\ResponseInterface;
use Marek\Toggable\API\Http\Response\WorkspaceUsers\Invitation;
use Marek\Toggable\API\Http\Response\WorkspaceUsers\WorkspaceUser;
use Marek\Toggable\API\Http\Response\WorkspaceUsers\WorkspaceUsers;
use Marek\Toggable\API\Toggl\Values\Workspace\User;
use Marek\Toggable\Http\Manager\NativeRequestManager;
use Marek\Toggable\Hydrator\Workspace\UserHydrator;
use Marek\Toggable\Service\WorkspaceUsers\WorkspaceUsersService;

class WorkspaceUsersTest extends \PHPUnit_Framework_TestCase
{
    public function testInviteUsers()
    {
        $mails = array(
            'test@test.com',
            'test2@test.com',
        );

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
                        array(
                            'id' => 123,
                        ),
                        array(
                            'id' => 456,
                        ),
                    ),
                    'notifications' => array(
                        'Message 1',
                        'Message 2',
                    )
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

        $hydrator->expects($this->any())
            ->method('hydrate')
            ->willReturn($user);


        $workspaceUsersService = new WorkspaceUsersService($requestManager, $hydrator);

        $response = $workspaceUsersService->inviteUsers(123, $mails);

        $this->assertInstanceOf(Invitation::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInviteUsersWithException()
    {
        $mails = array(
            'test@test.com',
            'test2@test.com',
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(UserHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $workspaceUsersService = new WorkspaceUsersService($requestManager, $hydrator);
        $workspaceUsersService->inviteUsers('test', $mails);
    }

    public function testUpdateWorkspaceUser()
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
                        array(
                            'id' => 123,
                        ),
                        array(
                            'id' => 456,
                        ),
                    ),
                    'notifications' => array(
                        'Message 1',
                        'Message 2',
                    )
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


        $workspaceUsersService = new WorkspaceUsersService($requestManager, $hydrator);

        $response = $workspaceUsersService->updateWorkspaceUser(123, $user);

        $this->assertInstanceOf(WorkspaceUser::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testUpdateWorkspaceUserWithException()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(UserHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $workspaceUsersService = new WorkspaceUsersService($requestManager, $hydrator);
        $workspaceUsersService->updateWorkspaceUser('test', new User());
    }

    public function testDeleteWorkspaceUser()
    {
        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        'Test',
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

        $workspaceUsersService = new WorkspaceUsersService($requestManager, $hydrator);

        $response = $workspaceUsersService->deleteWorkspaceUser(123);

        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testDeleteWorkspaceUserWithException()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(UserHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $workspaceUsersService = new WorkspaceUsersService($requestManager, $hydrator);

        $workspaceUsersService->deleteWorkspaceUser('test');
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
                        array(
                            'id' => 123,
                        ),
                        array(
                            'id' => 456,
                        ),
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

        $hydrator->expects($this->any())
            ->method('hydrate')
            ->willReturn($user);


        $workspaceUsersService = new WorkspaceUsersService($requestManager, $hydrator);

        $response = $workspaceUsersService->getWorkspaceUsers(123);

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

        $hydrator = $this->getMockBuilder(UserHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $workspaceUsersService = new WorkspaceUsersService($requestManager, $hydrator);

        $workspaceUsersService->getWorkspaceUsers('test');
    }
}
