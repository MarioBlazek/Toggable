<?php

namespace Marek\Toggable\Service\Dashboard;

use InvalidArgumentException;
use Marek\Toggable\API\Http\Request\Dashboard\GetDashboard;
use Marek\Toggable\API\Http\Response\Dashboard\Dashboard as DashboardResponse;
use Marek\Toggable\API\Toggl\Values\Dashboard\Dashboard;
use Marek\Toggable\API\Http\Response\Error;
use Marek\Toggable\API\Toggl\Values\Dashboard\Activity;
use Marek\Toggable\API\Toggl\Values\Dashboard\MostActiveUser;
use Marek\Toggable\Service\AbstractService;

/**
 * Class DashboardService
 * @package Marek\Toggable\Service\Dashboard
 */
class DashboardService extends AbstractService implements \Marek\Toggable\API\Toggl\DashboardServiceInterface
{
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

        $response = $this->delegate($request);

        $mostActiveUsers = array();
        if (!empty($response->body['most_active_user'])) {
            foreach($response->body['most_active_user'] as $mostActiveUser) {
                $mostActiveUsers[] = $this->hydrator->hydrate($mostActiveUser, new MostActiveUser());
            }
        }

        $activities = array();
        if (!empty($response->body['activity'])) {
            foreach ($response->body['activity'] as $activity) {
                $activities[] = $this->hydrator->hydrate($activity, new Activity());
            }
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
