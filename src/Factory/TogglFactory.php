<?php

namespace Marek\Toggable\Factory;

use Marek\Toggable\Http\Client\NativeHttpClient;
use Marek\Toggable\Http\Manager\NativeRequestManager;
use Marek\Toggable\Hydrator\HydratorFactory;
use Marek\Toggable\Service\Authentication\AuthenticationService;
use Marek\Toggable\Service\Dashboard\DashboardService;
use Marek\Toggable\Service\Project\ProjectService;
use Marek\Toggable\Service\ProjectUsers\ProjectUsersService;
use Marek\Toggable\Service\Tag\TagService;
use Marek\Toggable\Service\Task\TaskService;
use Marek\Toggable\Service\TimeEntry\TimeEntryService;
use Marek\Toggable\Service\User\UserService;
use Marek\Toggable\Service\WorkspaceUsers\WorkspaceUsersService;
use Marek\Toggable\Toggl;
use Marek\Toggable\API\Security\UsernameAndPasswordToken;
use Marek\Toggable\API\Security\ApiToken;
use Marek\Toggable\Http\Client\HttpClient;
use Marek\Toggable\Http\Manager\RequestManager;
use Marek\Toggable\Service\Client\ClientService;
use Marek\Toggable\Service\Workspace\WorkspaceService;

/**
 * Class TogglFactory
 * @package Marek\Toggable\Factory
 */
class TogglFactory
{
    /**
     * Builds Toggl
     *
     * @param string $config
     *
     * @return \Marek\Toggable\Toggl
     *
     * @throws \InvalidArgumentException
     */
    public static function buildToggable($config)
    {
        if (!file_exists($config)) {
            throw new \InvalidArgumentException('Please provide configuration file.');
        }

        $config = require($config);
        
        if (!empty($config['marek_toggable']['security']['token'])) {

            $authentication = new ApiToken($config['marek_toggable']['security']['token']);

        } else if (!empty($config['marek_toggable']['security']['username']) && !empty($config['marek_toggable']['security']['password'])) {

            $authentication = new UsernameAndPasswordToken(
                $config['marek_toggable']['security']['username'],
                $config['marek_toggable']['security']['password']
            );

        } else {

            throw new \InvalidArgumentException('Please provide security configuration.');

        }

        if (empty($config['marek_toggable']['base_uri']))
        {
            throw new \InvalidArgumentException('Please provide base URI.');
        }

        $nativeHttpClient = new NativeHttpClient($config['marek_toggable']['base_uri'], $authentication);
        $requestManager = new NativeRequestManager($nativeHttpClient);

        $hydrator = HydratorFactory::createHydrator();

        $authenticationService = new AuthenticationService($requestManager, $hydrator);
        $clientService = new ClientService($requestManager, $hydrator);
        $dashboardService = new DashboardService($requestManager, $hydrator);
        $projectService = new ProjectService($requestManager, $hydrator);
        $projectUsersService = new ProjectUsersService($requestManager, $hydrator);
        $tagService = new TagService($requestManager, $hydrator);
        $taskService = new TaskService($requestManager, $hydrator);
        $timeEntryService = new TimeEntryService($requestManager, $hydrator);

        $userService = new UserService($requestManager, $hydrator);
        $workspaceService = new WorkspaceService($requestManager, $hydrator);
        $workspaceUsersService = new WorkspaceUsersService($requestManager, $hydrator);

        $toggl = new Toggl(
            $authenticationService,
            $clientService,
            $dashboardService,
            $projectService,
            $projectUsersService,
            $tagService,
            $taskService,
            $timeEntryService,
            $userService,
            $workspaceService,
            $workspaceUsersService
        );

        return $toggl;
    }
}
