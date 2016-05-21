<?php

namespace Marek\Toggable\Factory;

use Marek\Toggable\Factory\Authentication\AuthenticationFactory;
use Marek\Toggable\Factory\Http\HttpClientFactory;
use InvalidArgumentException;
use Marek\Toggable\Factory\Hydrator\HydratorFactory;
use Marek\Toggable\Http\Manager\NativeRequestManager;
use Marek\Toggable\Service\Authentication\AuthenticationService;
use Marek\Toggable\Service\Client\ClientService;
use Marek\Toggable\Service\Dashboard\DashboardService;
use Marek\Toggable\Service\Project\ProjectService;
use Marek\Toggable\Service\ProjectUsers\ProjectUsersService;
use Marek\Toggable\Service\Tag\TagService;
use Marek\Toggable\Service\Task\TaskService;
use Marek\Toggable\Service\TimeEntry\TimeEntryService;
use Marek\Toggable\Service\User\UserService;
use Marek\Toggable\Service\Workspace\WorkspaceService;
use Marek\Toggable\Service\WorkspaceUsers\WorkspaceUsersService;
use Marek\Toggable\Toggl;

/**
 * Class TogglFactory
 * @package Marek\Toggable\Factory
 */
class TogglFactory implements FactoryInterface
{
    /**
     * @var \Marek\Toggable\Factory\FactoryInterface
     */
    private $authentication;

    /**
     * @var \Marek\Toggable\Factory\FactoryInterface
     */
    private $http;

    /**
     * @var \Marek\Toggable\Factory\FactoryInterface
     */
    private $hydrator;

    /**
     * TogglFactory constructor.
     *
     * @param array $config
     */
    public function __construct($config)
    {
        if (!is_array($config) || empty($config)) {
            throw new InvalidArgumentException('Please provide valid configuration.');
        }
        $this->authentication = new AuthenticationFactory($config);
        $this->http = new HttpClientFactory($config, $this->authentication->build());
        $this->hydrator = new HydratorFactory();

    }

    /**
     * @inheritDoc
     */
    public function build()
    {
        $nativeHttpClient = $this->http->build();
        $requestManager = new NativeRequestManager($nativeHttpClient);

        $hydrator = $this->hydrator->build();

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

        return new Toggl(
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
    }
}
