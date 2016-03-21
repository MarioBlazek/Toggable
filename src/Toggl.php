<?php

namespace Marek\Toggable;

use GuzzleHttp\Exception\ClientException;
use InvalidArgumentException;
use Marek\Toggable\API\Http\Client\ClientResponse;
use Marek\Toggable\API\Http\Project\ProjectsResponse;
use Marek\Toggable\API\Toggl\Project\Project;
use Zend\Hydrator\ObjectProperty;
use GuzzleHttp\Psr7\Request;
use Marek\Toggable\API\Http\Client\ClientsResponse;
use Marek\Toggable\API\Toggl\Client\Client;
use Marek\Toggable\Http\HttpClientInterface;

class Toggl implements TogglInterface
{
    /**
     * @var HttpClientInterface
     */
    private $client;

    /**
     * Toggl constructor.
     *
     * @param \Marek\Toggable\Http\HttpClientInterface $client
     */
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    private function setRequestAndGetResponse($request, $headers = array())
    {
        $response = $this->client->send($request);

        return json_decode((string)$response->getBody(), true);
    }

    public function createClient()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function getClientDetails($clientId)
    {
        if (empty($clientId) || !is_int($clientId)) {
            throw new InvalidArgumentException(
                sprintf('$clientId argument not provided in %s', get_class($this))
            );
        }

        $request = new Request('GET', 'clients/' . $clientId);
        $response = $this->setRequestAndGetResponse($request);

        $data = $response['data'];
        $client = (new ObjectProperty())->hydrate($data, new Client);

        return new ClientResponse(array('client' => $client));
    }

    /**
     * {@inheritdoc}
     */
    public function getClients()
    {
        $request = new Request('GET', 'clients');
        $response = $this->setRequestAndGetResponse($request);

        $clients = array();
        foreach($response as $client) {
            $clients[] = (new ObjectProperty())->hydrate($client, new Client);
        }

        return new ClientsResponse(array('clients' => $clients));
    }

    /**
     * {@inheritdoc}
     */
    public function getClientProjects($clientId, $active = Client::ACTIVE)
    {
        $request = new Request('GET', 'clients/' . $clientId . '/projects?active=' . $active);
        $response = $this->setRequestAndGetResponse($request);

        $projects = array();
        foreach($response as $project) {
            $projects[] = (new ObjectProperty())->hydrate($project, new Project());
        }

        return new ProjectsResponse(array('projects' => $projects));
    }

    public function updateClient()
    {
        // TODO: Implement updateClient() method.
    }

    public function deleteClient()
    {
        // TODO: Implement deleteClient() method.
    }
}
