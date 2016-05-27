<?php

namespace Marek\Toggable\Tests\Service\Authentication;

use Marek\Toggable\Http\Manager\NativeRequestManager;
use Marek\Toggable\Hydrator\HydratorInterface;
use Marek\Toggable\Service\Authentication\AuthenticationService;

class AuthenticationServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \RuntimeException
     */
    public function testGetSessionCookie()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(HydratorInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract', 'canHydrate'))
            ->getMock();

        $authService = new AuthenticationService($requestManager, $hydrator);

        $authService->getSessionCookie();
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testDestroySession()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(HydratorInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract', 'canHydrate'))
            ->getMock();

        $authService = new AuthenticationService($requestManager, $hydrator);

        $authService->destroySession();
    }
}
