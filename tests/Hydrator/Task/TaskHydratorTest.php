<?php

namespace Marek\Toggable\Tests\Hydrator\Task;

use Marek\Toggable\API\Toggl\Values\Dashboard\Activity;
use Marek\Toggable\API\Toggl\Values\Tag\Tag;
use Marek\Toggable\API\Toggl\Values\Task\Task;
use Marek\Toggable\Hydrator\Task\TaskHydrator;

class TaskHydratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TaskHydrator
     */
    private $hydrator;

    public function setUp()
    {
        $this->hydrator = new TaskHydrator();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Marek\Toggable\Hydrator\HydratorInterface', $this->hydrator);
    }

    public function testCanHydrate()
    {
        $this->assertFalse($this->hydrator->canHydrate(new Activity()));
        $this->assertFalse($this->hydrator->canHydrate(new Tag()));
        $this->assertTrue($this->hydrator->canHydrate(new Task()));
    }

    public function testItProperlyHydratesData()
    {
        $at = new \DateTime();

        $data = array(
            'id'                => 123,
            'name'              => "Test name",
            'pid'               => 345,
            'wid'               => 675,
            'uid'               => 45,
            'estimated_seconds' => 555,
            'active'            => true,
            'at'                => $at->format('c'),
            'tracked_seconds'   => 34,
        );

        /** @var Task $task */
        $task = $this->hydrator->hydrate($data, new Task());

        $this->assertEquals($data['id'], $task->id);
        $this->assertEquals($data['name'], $task->name);
        $this->assertEquals($data['pid'], $task->pid);
        $this->assertEquals($data['wid'], $task->wid);
        $this->assertEquals($data['uid'], $task->uid);
        $this->assertEquals($data['estimated_seconds'], $task->estimated_seconds);
        $this->assertEquals($data['active'], $task->active);
        $this->assertEquals($data['at'], $task->at->format('c'));
        $this->assertEquals($data['tracked_seconds'], $task->tracked_seconds);
    }

    public function testItProperlyExtractsObjects()
    {
        $at = new \DateTime();

        $task = new Task(
            array(
                'id'                => 123,
                'name'              => "Test name",
                'pid'               => 345,
                'wid'               => 675,
                'uid'               => 45,
                'estimated_seconds' => 555,
                'active'            => true,
                'at'                => $at,
                'tracked_seconds'   => 34,
            )
        );

        $data = $this->hydrator->extract($task);

        $this->assertEquals($task->id, $data['id']);
        $this->assertEquals($task->name, $data['name']);
        $this->assertEquals($task->pid, $data['pid']);
        $this->assertEquals($task->wid, $data['wid']);
        $this->assertEquals($task->uid, $data['uid']);
        $this->assertEquals($task->estimated_seconds, $data['estimated_seconds']);
        $this->assertEquals($task->active, $data['active']);
        $this->assertEquals($task->at->format('c'), $data['at']);
        $this->assertEquals($task->tracked_seconds, $data['tracked_seconds']);
    }
}
