<?php

namespace Marek\Toggable\Tests\Hydrator\TimeEntry;

use Marek\Toggable\API\Toggl\Values\Dashboard\Activity;
use Marek\Toggable\API\Toggl\Values\Tag\Tag;
use Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry;
use Marek\Toggable\Hydrator\TimeEntry\TimeEntryHydrator;

class TimeEntryHydratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TimeEntryHydrator
     */
    private $hydrator;

    public function setUp()
    {
        $this->hydrator = new TimeEntryHydrator();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Marek\Toggable\Hydrator\HydratorInterface', $this->hydrator);
    }

    public function testCanHydrate()
    {
        $this->assertFalse($this->hydrator->canHydrate(new Activity()));
        $this->assertFalse($this->hydrator->canHydrate(new Tag()));
        $this->assertTrue($this->hydrator->canHydrate(new TimeEntry()));
    }

    public function testItProperlyHydratesData()
    {
        $at = new \DateTime();
        $start = new \DateTime();
        $stop = new \DateTime();

        $data = array(
            'id'            => 123,
            'uid'           => 123,
            'description'   => "Test description",
            'wid'           => 123,
            'pid'           => 123,
            'tid'           => 123,
            'guid'          => 123,
            'billable'      => true,
            'start'         => $start->format('c'),
            'stop'          => $stop->format('c'),
            'duration'      => 45,
            'created_with'  => "Web app",
            'tags'          => array('tag1', 'tag2', 'tag3'),
            'duronly'       => true,
            'at'            => $at->format('c'),
        );

        /** @var TimeEntry $timeEntry */
        $timeEntry = $this->hydrator->hydrate($data, new TimeEntry());

        $this->assertEquals($data['id'], $timeEntry->id);
        $this->assertEquals($data['uid'], $timeEntry->uid);
        $this->assertEquals($data['description'], $timeEntry->description);
        $this->assertEquals($data['wid'], $timeEntry->wid);
        $this->assertEquals($data['pid'], $timeEntry->pid);
        $this->assertEquals($data['tid'], $timeEntry->tid);
        $this->assertEquals($data['guid'], $timeEntry->guid);
        $this->assertEquals($data['billable'], $timeEntry->billable);
        $this->assertEquals($data['start'], $timeEntry->start->format('c'));
        $this->assertEquals($data['stop'], $timeEntry->stop->format('c'));
        $this->assertEquals($data['duration'], $timeEntry->duration);
        $this->assertEquals($data['created_with'], $timeEntry->created_with);
        $this->assertEquals($data['tags'], $timeEntry->tags);
        $this->assertEquals($data['duronly'], $timeEntry->duronly);
        $this->assertEquals($data['at'], $timeEntry->at->format('c'));
    }

    public function testItProperlyExtractsObjects()
    {
        $at = new \DateTime();
        $start = new \DateTime();
        $stop = new \DateTime();

        $timeEntry = new TimeEntry(
            array(
                'id'            => 123,
                'uid'           => 123,
                'description'   => "Test description",
                'wid'           => 123,
                'pid'           => 123,
                'tid'           => 123,
                'guid'          => 123,
                'billable'      => true,
                'start'         => $start,
                'stop'          => $stop,
                'duration'      => 45,
                'created_with'  => "Web app",
                'tags'          => array('tag1', 'tag2', 'tag3'),
                'duronly'       => true,
                'at'            => $at,
            )
        );

        $data = $this->hydrator->extract($timeEntry);

        $this->assertEquals($timeEntry->id, $data['id']);
        $this->assertEquals($timeEntry->uid, $data['uid']);
        $this->assertEquals($timeEntry->description, $data['description']);
        $this->assertEquals($timeEntry->wid, $data['wid']);
        $this->assertEquals($timeEntry->pid, $data['pid']);
        $this->assertEquals($timeEntry->tid, $data['tid']);
        $this->assertEquals($timeEntry->guid, $data['guid']);
        $this->assertEquals($timeEntry->start->format('c'), $data['start']);
        $this->assertEquals($timeEntry->stop->format('c'), $data['stop']);
        $this->assertEquals($timeEntry->duration, $data['duration']);
        $this->assertEquals($timeEntry->created_with, $data['created_with']);
        $this->assertEquals($timeEntry->tags, $data['tags']);
        $this->assertEquals($timeEntry->duronly, $data['duronly']);
        $this->assertEquals($timeEntry->at->format('c'), $data['at']);
    }
}
