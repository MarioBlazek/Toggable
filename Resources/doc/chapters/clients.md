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


##Get client details##


##Update a client##


##Delete a client##


##Get workspace clients##


##Get clients visible to user##

##Get client projects##
