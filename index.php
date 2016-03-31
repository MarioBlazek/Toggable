<?php

require "vendor/autoload.php";

/** @var \Marek\Toggable\TogglInterface $toggl */
$toggl = \Marek\Toggable\Factory\TogglFactory::buildToggable();

/** @var \Marek\Toggable\API\Toggl\WorkspaceServiceInterface $workspaceService */
$workspaceService = $toggl->getWorkspaceService();
/** @var \Marek\Toggable\API\Toggl\ClientServiceInterface $clientService */
$clientService = $toggl->getClientService();

$response = $workspaceService->getWorkspaces();
var_dump($response);

$workspaceId = null;
foreach ($response->workspaces as $workspace) {
    $workspaceId = $workspace->id;
    echo $workspace->id . "\n";
}

$client = new \Marek\Toggable\API\Toggl\Values\Client\Client(array(
    'name' => 'Marek company',
    'wid' => $workspaceId,
));

$response = $clientService->createClient($client);
var_dump($response);

$client = new \Marek\Toggable\API\Toggl\Values\Client\Client(array(
    'name' => 'Marek company 2',
    'notes' => 'This is test',
));

$response = $clientService->updateClient($response->client->id, $client);
var_dump($response);

