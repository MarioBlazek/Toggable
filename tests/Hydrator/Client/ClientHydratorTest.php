<?php

namespace Marek\Toggable\Tests\Hydrator\Client;

use Marek\Toggable\API\Toggl\Values\Client\Client;
use Marek\Toggable\API\Toggl\Values\Tag\Tag;
use Marek\Toggable\API\Toggl\Values\Task\Task;
use Marek\Toggable\Hydrator\Client\ClientHydrator;
use Marek\Toggable\Hydrator\HydratorInterface;

class ClientHydratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var HydratorInterface
     */
    private $hydrator;

    public function setUp()
    {
        $this->hydrator = new ClientHydrator();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Marek\Toggable\Hydrator\HydratorInterface', $this->hydrator);
    }

    public function testCanHydrate()
    {
        $this->assertTrue($this->hydrator->canHydrate(new Client()));
        $this->assertFalse($this->hydrator->canHydrate(new Tag()));
        $this->assertFalse($this->hydrator->canHydrate(new Task()));
    }

    public function testItProperlyHydratesData()
    {
        $now = new \DateTime();

        $data = array(
            'id'    => 123,
            'guid'  => 456,
            'wid'   => 789,
            'name'  => 'Test name',
            'at'    => $now->format('c'),
            'notes' => 'Test notes',
            'hrate' => 4.57,
            'cur'   => 'HRK',
        );

        /** @var Client $client */
        $client = $this->hydrator->hydrate($data, new Client());

        $this->assertEquals($data['id'], $client->id);
        $this->assertEquals($data['guid'], $client->guid);
        $this->assertEquals($data['wid'], $client->wid);
        $this->assertEquals($data['at'], $client->at->format('c'));
        $this->assertEquals($data['notes'], $client->notes);
        $this->assertEquals($data['hrate'], $client->hrate);
        $this->assertEquals($data['cur'], $client->cur);
    }

    public function testItProperlyExtractsObjects()
    {
        $now = new \DateTime();

        $client = new Client(
            array(
                'id'    => 123,
                'guid'  => 456,
                'wid'   => 789,
                'name'  => 'Test name',
                'at'    => $now,
                'notes' => 'Test notes',
                'hrate' => 4.57,
                'cur'   => 'HRK',
            )
        );

        $data = $this->hydrator->extract($client);

        $this->assertEquals($client->id, $data['id']);
        $this->assertEquals($client->guid, $data['guid']);
        $this->assertEquals($client->wid, $data['wid']);
        $this->assertEquals($client->name, $data['name']);
        $this->assertEquals($client->at->format('c'), $data['at']);
        $this->assertEquals($client->notes, $data['notes']);
        $this->assertEquals($client->hrate, $data['hrate']);
        $this->assertEquals($client->cur, $data['cur']);
    }
}
