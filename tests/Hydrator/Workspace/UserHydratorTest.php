<?php

namespace Marek\Toggable\Tests\Hydrator\Workspace;

use Marek\Toggable\API\Toggl\Values\Dashboard\Activity;
use Marek\Toggable\API\Toggl\Values\Tag\Tag;
use Marek\Toggable\API\Toggl\Values\Workspace\User;
use Marek\Toggable\Hydrator\Workspace\UserHydrator;

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
        $this->assertFalse($this->hydrator->canHydrate(new Activity()));
        $this->assertFalse($this->hydrator->canHydrate(new Tag()));
        $this->assertTrue($this->hydrator->canHydrate(new User()));
    }

    public function testItProperlyHydratesData()
    {
        $data = array(
            'id'            => 123,
            'uid'           => 456,
            'admin'         => false,
            'active'        => true,
            'invite_url'    => "www.test.com",
        );

        /** @var User $user */
        $user = $this->hydrator->hydrate($data, new User());

        $this->assertEquals($data['id'], $user->id);
        $this->assertEquals($data['uid'], $user->uid);
        $this->assertEquals($data['admin'], $user->admin);
        $this->assertEquals($data['active'], $user->active);
        $this->assertEquals($data['invite_url'], $user->invite_url);
    }

    public function testItProperlyExtractsObjects()
    {
        $user = new User(
            array(
                'id'            => 123,
                'uid'           => 456,
                'admin'         => false,
                'active'        => true,
                'invite_url'    => "www.test.com",
            )
        );

        $data = $this->hydrator->extract($user);

        $this->assertEquals($user->id, $data['id']);
        $this->assertEquals($user->uid, $data['uid']);
        $this->assertEquals($user->admin, $data['admin']);
        $this->assertEquals($user->active, $data['active']);
        $this->assertEquals($user->invite_url, $data['invite_url']);
    }
}
