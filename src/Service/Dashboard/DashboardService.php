<?php

namespace Marek\Toggable\Service\Dashboard;

use InvalidArgumentException;
use Marek\Toggable\API\Http\Request\Dashboard\GetDashboard;
use Marek\Toggable\API\Http\Response\Dashboard\Dashboard as DashboardResponse;
use Marek\Toggable\API\Toggl\Values\Dashboard\Dashboard;
use Marek\Toggable\API\Http\Response\Error;
use Marek\Toggable\API\Toggl\Values\Dashboard\Activity;
use Marek\Toggable\API\Toggl\Values\Dashboard\MostActiveUser;

/**
 * Class DashboardService
 * @package Marek\Toggable\Service\Dashboard
 */
class DashboardService implements \Marek\Toggable\API\Toggl\DashboardServiceInterface
{
    /**
     * @var \Marek\Toggable\Http\Manager\RequestManagerInterface
     */
    private $requestManager;

    /**
     * @var \Marek\Toggable\Hydrator\HydratorInterface
     */
    private $hydrator;

    /**
     * DashboardService constructor.
     *
     * @param \Marek\Toggable\Http\Manager\RequestManagerInterface $requestManager
     * @param \Marek\Toggable\Hydrator\HydratorInterface $hydrator
     */
    public function __construct(
        \Marek\Toggable\Http\Manager\RequestManagerInterface $requestManager,
        \Marek\Toggable\Hydrator\HydratorInterface $hydrator
    )
    {
        $this->requestManager = $requestManager;
        $this->hydrator = $hydrator;
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

        $mostActiveUsers = array();
        foreach($response->body['most_active_user'] as $mostActiveUser) {
            $mostActiveUsers[] = $this->hydrator->hydrate($mostActiveUser, new MostActiveUser());
        }

        $activities = array();
        foreach($response->body['activity'] as $activity) {
            $activities[] = $this->hydrator->hydrate($activity, new Activity());
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
