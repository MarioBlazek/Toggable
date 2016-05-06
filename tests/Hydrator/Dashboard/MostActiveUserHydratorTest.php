<?php

namespace Marek\Toggable\Tests\Hydrator\Dashboard;

use Marek\Toggable\API\Toggl\Values\Dashboard\MostActiveUser;
use Marek\Toggable\API\Toggl\Values\Tag\Tag;
use Marek\Toggable\API\Toggl\Values\Task\Task;
use Marek\Toggable\Hydrator\Dashboard\MostActiveUserHydrator;

class MostActiveUserHydratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MostActiveUserHydrator
     */
    private $hydrator;

    public function setUp()
    {
        $this->hydrator = new MostActiveUserHydrator();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Marek\Toggable\Hydrator\HydratorInterface', $this->hydrator);
    }

    public function testCanHydrate()
    {
        $this->assertTrue($this->hydrator->canHydrate(new MostActiveUser()));
        $this->assertFalse($this->hydrator->canHydrate(new Tag()));
        $this->assertFalse($this->hydrator->canHydrate(new Task()));
    }

    public function testItProperlyHydratesData()
    {
        $data = array(
            'user_id'   => 123,
            'duration'  => 456,
        );

        /** @var MostActiveUser $mostActiveUser */
        $mostActiveUser = $this->hydrator->hydrate($data, new MostActiveUser());

        $this->assertEquals($data['user_id'], $mostActiveUser->user_id);
        $this->assertEquals($data['duration'], $mostActiveUser->duration);
    }

    public function testItProperlyExtractsObjects()
    {
        $mostActiveUser = new MostActiveUser(
            array(
                'user_id'   => 123,
                'duration'  => 456,
            )
        );

        $data = $this->hydrator->extract($mostActiveUser);

        $this->assertEquals($mostActiveUser->user_id, $data['user_id']);
        $this->assertEquals($mostActiveUser->duration, $data['duration']);
    }
}
