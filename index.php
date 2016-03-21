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

$client = new \Marek\Toggable\Http\HttpClient($guzzle, $apiToken);

/** @var \Marek\Toggable\Toggl $toggl */
$toggl = new \Marek\Toggable\Toggl($client);

$response = $toggl->getClientProjects(17491841);

var_dump($response);
