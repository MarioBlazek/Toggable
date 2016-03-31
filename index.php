<?php

require "vendor/autoload.php";

if (!file_exists('config.yml')) {
    die;
}

try {
    $config = \Symfony\Component\Yaml\Yaml::parse(file_get_contents('config.yml'));
} catch (\Symfony\Component\Yaml\Exception\ParseException $e) {
    echo "Error reading config file\n";
}

$apiToken = new \Marek\Toggable\API\Security\ApiToken(
    $config['marek_toggable']['security']['token']
);

$guzzle = new \GuzzleHttp\Client(array(
    'base_uri' => $config['marek_toggable']['base_uri']
    )
);

$httpClient = new \Marek\Toggable\Http\HttpClient($guzzle, $apiToken);
$requestManager = new \Marek\Toggable\Http\RequestManager($httpClient);
$clientService = new \Marek\Toggable\Service\Client\ClientService($requestManager);
$workspaceService = new \Marek\Toggable\Service\Workspace\WorkspaceService($requestManager);

$toggl = new Marek\Toggable\Toggl($clientService, $workspaceService);

//$clientService = $toggl->getClientService();
//$client = new \Marek\Toggable\API\Toggl\Values\Client\Client(array('name' => 'Very Big Company', 'wid' => 777));
//$response = $clientService->createClient($client);
$workspaceService = $toggl->getWorkspaceService();
$response = $workspaceService->getWorkspaces();


var_dump($response);
