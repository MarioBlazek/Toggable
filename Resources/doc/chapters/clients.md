Clients
====================

For Toggl specification please check [here](https://github.com/toggl/toggl_api_docs/blob/master/chapters/clients.md).

##Initital setup##

```php
<?php

require "vendor/autoload.php";

$config = 'config.local.php';

/** @var \Marek\Toggable\TogglInterface $toggl */
$toggl = \Marek\Toggable\Factory\TogglFactory::buildToggable($config);
/** @var \Marek\Toggable\API\Toggl\ClientServiceInterface $clientService */
$clientService = $toggl->getClientService();
...
```

##Create a client##

```php
...
$client = new \Marek\Toggable\API\Toggl\Values\Client\Client(
    array(
        'name' => 'Very Big Company',
        'wid' => 777,
    )
);

/** @var \Marek\Toggable\API\Http\Response\Client\Client $response */
$response = $clientService->createClient($client);
/** @var \Marek\Toggable\API\Toggl\Values\Client\Client $client */
$client = $response->client;

echo $client->name;
```


##Get client details##

```php
...

/** @var \Marek\Toggable\API\Http\Response\Client\Client $response */
$response = $clientService->getClientDetails(123456789);
/** @var \Marek\Toggable\API\Toggl\Values\Client\Client $client */
$client = $response->client;

echo $client->name;
```

##Update a client##

```php
...
$client = new \Marek\Toggable\API\Toggl\Values\Client\Client(
    array(
        'name' => 'Very Very Big Company',
        'notes' => 'something about the client',
    )
);
/** @var \Marek\Toggable\API\Http\Response\Client\Client $response */
$response = $clientService->updateClient(123456789, $client);
/** @var \Marek\Toggable\API\Toggl\Values\Client\Client $client */
$client = $response->client;

echo $client->name;
```

##Delete a client##

```php
...
/** @var \Marek\Toggable\API\Http\Response\Successful $response */
$response = $clientService->deleteClient(123456789);

```

##Get workspace clients##

Retrieving workspace clients is documented [here](workspaces.md).

##Get clients visible to user##

```php
...
/** @var \Marek\Toggable\API\Http\Response\Client\Clients $response */
$response = $clientService->getClients();

/** @var \Marek\Toggable\API\Toggl\Values\Client\Client $client */
foreach ($response->clients as $client) {
    echo $client->name . "\n";
}
```

##Get client projects##

```php
...
/** @var \Marek\Toggable\API\Http\Response\Project\Projects $response */
$response = $clientService->getClientProjects(123456789);

/** @var \Marek\Toggable\API\Toggl\Values\Project\Project $project */
foreach ($response->projects as $project) {
    echo $project->name . "\n";
}
```
