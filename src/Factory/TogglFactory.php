<?php

namespace Marek\Toggable\Factory;

use Marek\Toggable\Hydrator\DataHydrator;
use Marek\Toggable\Service\Authentication\AuthenticationService;
use Marek\Toggable\Service\Dashboard\DashboardService;
use GuzzleHttp\Client;
use Marek\Toggable\Toggl;
use Marek\Toggable\API\Security\UsernameAndPasswordToken;
use Marek\Toggable\API\Security\ApiToken;
use Marek\Toggable\Http\Client\HttpClient;
use Marek\Toggable\Http\Manager\RequestManager;
use Marek\Toggable\Service\Client\ClientService;
use Marek\Toggable\Service\Workspace\WorkspaceService;

class TogglFactory
{
    public static function buildToggable($config)
    {
        if (!file_exists($config)) {
            throw new \InvalidArgumentException('Please provide configuration file.');
        }

        $config = require_once($config);

        $authentication = null;
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

        $guzzle = new Client(array(
                'base_uri' => $config['marek_toggable']['base_uri']
            )
        );

        $httpClient = new HttpClient($guzzle, $authentication);
        $requestManager = new RequestManager($httpClient);
        $hydrator = new DataHydrator();
        $clientService = new ClientService($requestManager, $hydrator);
        $workspaceService = new WorkspaceService($requestManager, $hydrator);
        $authenticationService = new AuthenticationService($requestManager, $hydrator);
        $dashboardService = new DashboardService($requestManager, $hydrator);

        $toggl = new Toggl($clientService, $workspaceService, $authenticationService, $dashboardService);

        return $toggl;
    }
}
