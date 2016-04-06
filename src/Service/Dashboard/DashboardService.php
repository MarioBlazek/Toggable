<?php

namespace Marek\Toggable\Service\Dashboard;

use InvalidArgumentException;
use Marek\Toggable\API\Http\Request\Dashboard\GetDashboard;
use Marek\Toggable\API\Http\Response\Dashboard\Dashboard as DashboardResponse;
use Marek\Toggable\API\Toggl\Values\Dashboard\Dashboard;
use Marek\Toggable\API\Http\Response\Error;
use Marek\Toggable\API\Toggl\DashboardServiceInterface;
use Marek\Toggable\API\Toggl\Values\Dashboard\Activity;
use Marek\Toggable\API\Toggl\Values\Dashboard\MostActiveUser;
use Marek\Toggable\Http\RequestManagerInterface;
use Zend\Hydrator\ObjectProperty;

/**
 * Class DashboardService
 * @package Marek\Toggable\Service\Dashboard
 */
class DashboardService implements DashboardServiceInterface
{
    /**
     * @var \Marek\Toggable\Http\RequestManagerInterface
     */
    private $requestManager;

    /**
     * DashboardService constructor.
     *
     * @param \Marek\Toggable\Http\RequestManagerInterface $requestManager
     */
    public function __construct(RequestManagerInterface $requestManager)
    {
        $this->requestManager = $requestManager;
    }

    /**
     * @inheritDoc
     */
    public function getDashboardData($workspaceId)
    {
        if (empty($workspaceId) || !is_int($workspaceId)) {
            throw new InvalidArgumentException(
                sprintf('$workspaceId argument not provided in %s', get_class($this))
            );
        }

        $request = new GetDashboard(array(
            'workspaceId' => $workspaceId,
        ));

        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        $objectProperty = new ObjectProperty();

        $mostActiveUsers = array();
        foreach($response->body['most_active_user'] as $mostActiveUser) {
            $mostActiveUsers[] = $objectProperty->hydrate($mostActiveUser, new MostActiveUser());
        }

        $activities = array();
        foreach($response->body['activity'] as $activity) {
            $activities[] = $objectProperty->hydrate($activity, new Activity());
        }

        $dashboard = new Dashboard(array(
            'activity' => $activities,
            'mostActiveUser' => $mostActiveUsers,
        ));

        return new DashboardResponse(array(
            'dashboard' => $dashboard,
        ));
    }
}
