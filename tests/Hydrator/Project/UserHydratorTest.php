<?php

namespace Marek\Toggable\Tests\Hydrator\Project;

use Marek\Toggable\API\Toggl\Values\Project\User;
use Marek\Toggable\API\Toggl\Values\Tag\Tag;
use Marek\Toggable\API\Toggl\Values\Task\Task;
use Marek\Toggable\Hydrator\Project\UserHydrator;

class UserHydratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UserHydrator
     */
    private $hydrator;

    public function setUp()
    {
        $this->hydrator = new UserHydrator();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Marek\Toggable\Hydrator\HydratorInterface', $this->hydrator);
    }

    public function testCanHydrate()
    {
        $this->assertTrue($this->hydrator->canHydrate(new User()));
        $this->assertFalse($this->hydrator->canHydrate(new Tag()));
        $this->assertFalse($this->hydrator->canHydrate(new Task()));
    }

    public function testItProperlyHydratesData()
    {
        $at = new \DateTime();

        $data = array(
            'id' => 123,
            'pid' => 123,
            'uid' => 123,
            'wid' => 123,
            'manager' => true,
            'rate' => 4.7,
            'at' => $at->format('c'),
            'fullname' => "Test fullname",
        );

        /** @var User $project */
        $project = $this->hydrator->hydrate($data, new User());

        $this->assertEquals($data['id'], $project->id);
        $this->assertEquals($data['pid'], $project->pid);
        $this->assertEquals($data['uid'], $project->uid);
        $this->assertEquals($data['wid'], $project->wid);
        $this->assertEquals($data['manager'], $project->manager);
        $this->assertEquals($data['rate'], $project->rate);
        $this->assertEquals($data['at'], $project->at->format('c'));
        $this->assertEquals($data['fullname'], $project->fullname);
    }

    public function testItProperlyExtractsObjects()
    {
        $at = new \DateTime();

        $user = new User(
            array(
                'id' => 123,
                'pid' => 123,
                'uid' => 123,
                'wid' => 123,
                'manager' => true,
                'rate' => 4.7,
                'at' => $at,
                'fullname' => "Test fullname",
            )
        );

        $data = $this->hydrator->extract($user);

        $this->assertEquals($user->id, $data['id']);
        $this->assertEquals($user->pid, $data['pid']);
        $this->assertEquals($user->uid, $data['uid']);
        $this->assertEquals($user->wid, $data['wid']);
        $this->assertEquals($user->manager, $data['manager']);
        $this->assertEquals($user->rate, $data['rate']);
        $this->assertEquals($user->at->format('c'), $data['at']);
        $this->assertEquals($user->fullname, $data['fullname']);
    }
}
