<?php

namespace Marek\Toggable\Tests\Hydrator\Tag;

use Marek\Toggable\API\Toggl\Values\Dashboard\Activity;
use Marek\Toggable\API\Toggl\Values\Tag\Tag;
use Marek\Toggable\API\Toggl\Values\Task\Task;
use Marek\Toggable\Hydrator\Tag\TagHydrator;

class TagHydratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TagHydrator
     */
    private $hydrator;

    public function setUp()
    {
        $this->hydrator = new TagHydrator();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Marek\Toggable\Hydrator\HydratorInterface', $this->hydrator);
    }

    public function testCanHydrate()
    {
        $this->assertFalse($this->hydrator->canHydrate(new Activity()));
        $this->assertTrue($this->hydrator->canHydrate(new Tag()));
        $this->assertFalse($this->hydrator->canHydrate(new Task()));
    }

    public function testItProperlyHydratesData()
    {
        $at = new \DateTime();

        $data = array(
            'id'    => 123,
            'guid'  => 456,
            'name'  => "Test name",
            'wid'   => 345,
            'at'    => $at->format('c'),
        );

        /** @var Tag $tag */
        $tag = $this->hydrator->hydrate($data, new Tag());

        $this->assertEquals($data['id'], $tag->id);
        $this->assertEquals($data['guid'], $tag->guid);
        $this->assertEquals($data['name'], $tag->name);
        $this->assertEquals($data['wid'], $tag->wid);
        $this->assertEquals($data['at'], $tag->at->format('c'));
    }

    public function testItProperlyExtractsObjects()
    {
        $at = new \DateTime();

        $tag = new Tag(
            array(
                'id'    => 123,
                'guid'  => 456,
                'name'  => "Test name",
                'wid'   => 466,
                'at'    => $at,
            )
        );

        $data = $this->hydrator->extract($tag);

        $this->assertEquals($tag->id, $data['id']);
        $this->assertEquals($tag->guid, $data['guid']);
        $this->assertEquals($tag->name, $data['name']);
        $this->assertEquals($tag->wid, $data['wid']);
        $this->assertEquals($tag->at->format('c'), $data['at']);
    }
}
