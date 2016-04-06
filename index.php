<?php

require "vendor/autoload.php";

$config = 'config.local.php';

/** @var \Marek\Toggable\TogglInterface $toggl */
$toggl = \Marek\Toggable\Factory\TogglFactory::buildToggable($config);

/** @var \Marek\Toggable\API\Toggl\WorkspaceServiceInterface $workspaceService */
$workspaceService = $toggl->getWorkspaceService();
/** @var \Marek\Toggable\API\Toggl\ClientServiceInterface $clientService */
$clientService = $toggl->getClientService();
/** @var \Marek\Toggable\API\Toggl\AuthenticationServiceInterface $authenticationService */
$authenticationService = $toggl->getAuthenticationService();
/** @var \Marek\Toggable\API\Toggl\DashboardServiceInterface $dashboardService */
$dashboardService = $toggl->getDashboardService();

$response = $workspaceService->getWorkspaces();

$workspaceId = null;
foreach ($response->workspaces as $workspace) {
    $workspaceId = $workspace->id;
    echo $workspace->id . "\n";
}

$response = $dashboardService->getDashboardData($workspaceId);

$dashboard = $response->dashboard;

echo "5 users who have tracked the most time during last 7 days:\n";
/** @var \Marek\Toggable\API\Toggl\Values\Dashboard\MostActiveUser $mostActiveUser */
foreach ($dashboard->mostActiveUser as $mostActiveUser) {
    echo "Most active user id: $mostActiveUser->user_id, with duration: $mostActiveUser->duration\n";
}

echo "\n";
echo "10 latest actions in the workspace:\n";
/** @var \Marek\Toggable\API\Toggl\Values\Dashboard\Activity $activity */
foreach ($dashboard->activity as $activity) {
    echo "Activity on project: $activity->project_id, by user: $activity->user_id, with description: $activity->description\n";
}

