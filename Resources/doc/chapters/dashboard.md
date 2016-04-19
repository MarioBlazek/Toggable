Dashboard
==========

For Toggl specification please check [here](https://github.com/toggl/toggl_api_docs/blob/master/chapters/dashboard.md).

##Initital setup##

```php
<?php

require "vendor/autoload.php";

$config = 'config.local.php';

/** @var \Marek\Toggable\TogglInterface $toggl */
$toggl = \Marek\Toggable\Factory\TogglFactory::buildToggable($config);
/** @var \Marek\Toggable\API\Toggl\DashboardServiceInterface $dashboardService */
$dashboardService = $toggl->getDashboardService();
...
```

##Get Dashboard data##

```php
...
/** @var \Marek\Toggable\API\Http\Response\Dashboard\Dashboard $response */
$response = $dashboardService->getDashboardData(123456789);

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
```
