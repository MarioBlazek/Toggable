<?php

namespace Marek\Toggable\Tests\Hydrator\Dashboard;

use Marek\Toggable\API\Toggl\Values\Dashboard\Activity;
use Marek\Toggable\API\Toggl\Values\Tag\Tag;
use Marek\Toggable\API\Toggl\Values\Task\Task;
use Marek\Toggable\Hydrator\Dashboard\ActivityHydrator;

class ActivityHydratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ActivityHydrator
     */
    private $hydrator;

    public function setUp()
    {
        $this->hydrator = new ActivityHydrator();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Marek\Toggable\Hydrator\HydratorInterface', $this->hydrator);
    }

    public function testCanHydrate()
    {
        $this->assertTrue($this->hydrator->canHydrate(new Activity()));
        $this->assertFalse($this->hydrator->canHydrate(new Tag()));
        $this->assertFalse($this->hydrator->canHydrate(new Task()));
    }

    public function testItProperlyHydratesData()
    {
        $stop = new \DateTime();

        $data = array(
            'user_id'       => 123,
            'project_id'    => 456,
            'duration'      => 789,
            'description'   => 'Test description',
            'stop'          => $stop->format('c'),
            'tid'           => 1232,
        );

        /** @var Activity $activity */
        $activity = $this->hydrator->hydrate($data, new Activity());

        $this->assertEquals($data['user_id'], $activity->user_id);
        $this->assertEquals($data['project_id'], $activity->project_id);
        $this->assertEquals($data['duration'], $activity->duration);
        $this->assertEquals($data['description'], $activity->description);
        $this->assertEquals($data['stop'], $activity->stop->format('c'));
        $this->assertEquals($data['tid'], $activity->tid);
    }

    public function testItProperlyExtractsObjects()
    {
        $stop = new \DateTime();

        $activity = new Activity(
            array(
                'user_id'       => 123,
                'project_id'    => 456,
                'duration'      => 789,
                'description'   => 'Test description',
                'stop'          => $stop,
                'tid'           => 1232,
            )
        );

        $data = $this->hydrator->extract($activity);

        $this->assertEquals($activity->user_id, $data['user_id']);
        $this->assertEquals($activity->project_id, $data['project_id']);
        $this->assertEquals($activity->duration, $data['duration']);
        $this->assertEquals($activity->description, $data['description']);
        $this->assertEquals($activity->stop->format('c'), $data['stop']);
        $this->assertEquals($activity->tid, $data['tid']);
    }
}
