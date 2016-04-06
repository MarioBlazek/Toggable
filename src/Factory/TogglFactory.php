<?php

namespace Marek\Toggable\Factory;

use Marek\Toggable\Service\Authentication\AuthenticationService;
use Marek\Toggable\Service\Dashboard\DashboardService;
use Symfony\Component\Yaml\Yaml;
use GuzzleHttp\Client;
use Marek\Toggable\Toggl;
use Marek\Toggable\API\Security\UsernameAndPasswordToken;
use Marek\Toggable\API\Security\ApiToken;
use Marek\Toggable\Http\HttpClient;
use Marek\Toggable\Http\RequestManager;
use Marek\Toggable\Service\Client\ClientService;
use Marek\Toggable\Service\Workspace\WorkspaceService;

class TogglFactory
{
    public static function buildToggable()
    {
        if (!file_exists(__DIR__ . '/../../config.yml')) {
            throw new \InvalidArgumentException('Please provide configuration file.');
        }

        $config = Yaml::parse(file_get_contents(__DIR__ . '/../../config.yml'));

        if (!empty($config['marek_toggable']['security']['token'])) {

            $apiToken = new ApiToken($config['marek_toggable']['security']['token']);

        } else if (!empty($config['marek_toggable']['security']['username']) && !empty($config['marek_toggable']['security']['password'])) {

            $usernameAndPasswordToken = new UsernameAndPasswordToken(
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

        $httpClient = new HttpClient($guzzle, $apiToken);
        $requestManager = new RequestManager($httpClient);
        $clientService = new ClientService($requestManager);
        $workspaceService = new WorkspaceService($requestManager);
        $authenticationService = new AuthenticationService($requestManager);
        $dashboardService = new DashboardService($requestManager);

        $toggl = new Toggl($clientService, $workspaceService, $authenticationService, $dashboardService);

        return $toggl;
    }
}
