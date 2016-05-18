<?php

namespace Marek\Toggable\Tests\Service\Dashboard;

use Marek\Toggable\API\Http\Response\Dashboard\Dashboard;
use Marek\Toggable\API\Http\Response\Response;
use Marek\Toggable\Http\Manager\NativeRequestManager;
use Marek\Toggable\Hydrator\AggregateHydrator;
use Marek\Toggable\Service\Dashboard\DashboardService;

class DashboardServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testGetDashboardData()
    {
        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'most_active_user' => array(
                        array('test'),
                    ),
                    'activity' => array(
                        array('test'),
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

        $hydrator = $this->getMockBuilder(AggregateHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate'))
            ->getMock();

        $hydrator->expects($this->any())
            ->method('hydrate');


        $dashboardService = new DashboardService($requestManager, $hydrator);

        $response = $dashboardService->getDashboardData(123456);

        $this->assertInstanceOf(Dashboard::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetDashboardDataWithInvalidClientId()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(AggregateHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate'))
            ->getMock();


        $dashboardService = new DashboardService($requestManager, $hydrator);

        $dashboardService->getDashboardData('test');
    }
}
