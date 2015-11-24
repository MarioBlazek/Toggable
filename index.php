<?php

require "vendor/autoload.php";

use Marek\Toggl\Configuration\TokenAuth;
use Marek\Toggl\Http\Factory\HttpClientFactory;
use Marek\Toggl\Http\HttpClient;
use Marek\Toggl\API\Repository;
use Marek\Toggl\Http\Factory\RequestFactory;
use Marek\Toggl\Http\Factory\ResponseFactory;
use Marek\Toggl\Http\Value\Response\Response;

$token = file_get_contents('token.txt.dist');

$auth = new TokenAuth((string)$token);

$headers = [
    'Content-Type' => 'application/json',
];

$baseUri = "https://www.toggl.com/api/v8/";
$client = HttpClientFactory::createWithParameters($baseUri);

$requestFactory = new RequestFactory();
$responseFactory = new ResponseFactory();
$httpClient = new HttpClient($auth, $client, $requestFactory, $responseFactory);

$repository = new Repository($httpClient);
/** @var Response $response */
$response = $repository->me();

var_dump($response);
