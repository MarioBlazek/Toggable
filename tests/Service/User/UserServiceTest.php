<?php

namespace Marek\Toggable\Tests\Service\User;

use Marek\Toggable\API\Http\Response\Response;
use Marek\Toggable\API\Http\Response\Users\Token;
use Marek\Toggable\API\Toggl\Values\User\SignUp;
use Marek\Toggable\API\Toggl\Values\User\User;
use Marek\Toggable\Http\Manager\NativeRequestManager;
use Marek\Toggable\Hydrator\User\UserHydrator;
use Marek\Toggable\Service\User\UserService;

class UserServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testGetCurrentUserData()
    {
        $data = array(
            'id' => 123,
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
            ->method('hydrate')
            ->willReturn($user);


        $userService = new UserService($requestManager, $hydrator);

        $response = $userService->getCurrentUserData();

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\Users\User::class, $response);
    }

    public function testUpdateUser()
    {
        $data = array(
            'id' => 123,
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


        $userService = new UserService($requestManager, $hydrator);

        $response = $userService->updateUser($user);

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\Users\User::class, $response);
    }

    public function testResetApiToken()
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

        $userService = new UserService($requestManager, $hydrator);

        $response = $userService->resetApiToken();

        $this->assertInstanceOf(Token::class, $response);
    }

    public function testSignUpNewUser()
    {
        $data = array(
            'email' => 'email',
            'password' => 'password',
        );

        $user = new SignUp($data);

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


        $userService = new UserService($requestManager, $hydrator);

        $response = $userService->signUpNewUser($user);

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\Users\User::class, $response);
    }
}
