<?php

namespace Marek\Toggable\Tests\Hydrator\User;

use Marek\Toggable\API\Toggl\Values\Dashboard\Activity;
use Marek\Toggable\API\Toggl\Values\Tag\Tag;
use Marek\Toggable\API\Toggl\Values\User\BlogPost;
use Marek\Toggable\API\Toggl\Values\User\User;
use Marek\Toggable\Hydrator\User\UserHydrator;

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
        $at = new \DateTime();
        $createdAt = new \DateTime();
        $newBlogPost = new BlogPost(array('title' => 'Title', 'url' => 'www.test.com'));
        $lastBlogPost = new BlogPost(array('title' => 'Title', 'url' => 'www.test.com'));

        $data = array(
            'id'                        => 123,
            'api_token'                 => "api_token",
            'default_wid'               => 345,
            'fullname'                  => "Test fullname",
            'email'                     => "test@test.com",
            'jquery_timeofday_format'   => "dd/mm/yyyy",
            'jquery_date_format'        => "dd/mm/yyyy",
            'timeofday_format'          => "dd/mm/yyyy",
            'date_format'               => "dd/mm/yyyy",
            'store_start_and_stop_time' => false,
            'beginning_of_week'         => 1,
            'language'                  => "HR",
            'image_url'                 => "www.test.com",
            'sidebar_piechart'          => true,
            'at'                        => $at->format('c'),
            'created_at'                => $createdAt->format('c'),
            'retention'                 => 34,
            'record_timeline'           => true,
            'render_timeline'           => true,
            'timeline_enabled'          => true,
            'timeline_experiment'       => true,
            'manual_mode'               => true,
            'should_upgrade'            => true,
            'achievements_enabled'      => true,
            'openid_enabled'            => true,
            'new_blog_post'             => array('title' => 'Title', 'url' => 'www.test.com'),
            'last_blog_entry'           => array('title' => 'Title', 'url' => 'www.test.com'),
            'send_product_emails'       => true,
            'send_weekly_report'        => true,
            'send_timer_notifications'  => true,
            'invitation'                => true,
            'timezone'                  => 'Europe\Zagreb',
            'duration_format'           => 'dd/mm/yyyy',
            'obm'                       => 'obm',
            'used_next'                 => true,
        );

        /** @var User $user */
        $user = $this->hydrator->hydrate($data, new User());

        $this->assertEquals($data['id'], $user->id);
        $this->assertEquals($data['api_token'], $user->api_token);
        $this->assertEquals($data['default_wid'], $user->default_wid);
        $this->assertEquals($data['fullname'], $user->fullname);
        $this->assertEquals($data['email'], $user->email);
        $this->assertEquals($data['jquery_timeofday_format'], $user->jquery_timeofday_format);
        $this->assertEquals($data['jquery_date_format'], $user->jquery_date_format);
        $this->assertEquals($data['timeofday_format'], $user->timeofday_format);
        $this->assertEquals($data['date_format'], $user->date_format);
        $this->assertEquals($data['store_start_and_stop_time'], $user->store_start_and_stop_time);
        $this->assertEquals($data['beginning_of_week'], $user->beginning_of_week);
        $this->assertEquals($data['language'], $user->language);
        $this->assertEquals($data['image_url'], $user->image_url);
        $this->assertEquals($data['sidebar_piechart'], $user->sidebar_piechart);
        $this->assertEquals($data['at'], $user->at->format('c'));
        $this->assertEquals($data['created_at'], $user->created_at->format('c'));
        $this->assertEquals($data['retention'], $user->retention);
        $this->assertEquals($data['record_timeline'], $user->record_timeline);
        $this->assertEquals($data['render_timeline'], $user->render_timeline);
        $this->assertEquals($data['timeline_enabled'], $user->timeline_enabled);
        $this->assertEquals($data['timeline_experiment'], $user->timeline_experiment);
        $this->assertEquals($data['manual_mode'], $user->manual_mode);
        $this->assertEquals($data['should_upgrade'], $user->should_upgrade);
        $this->assertEquals($data['achievements_enabled'], $user->achievements_enabled);
        $this->assertEquals($data['openid_enabled'], $user->openid_enabled);
        $this->assertEquals($newBlogPost, $user->new_blog_post);
        $this->assertEquals($lastBlogPost, $user->last_blog_entry);
        $this->assertEquals($data['send_product_emails'], $user->send_product_emails);
        $this->assertEquals($data['send_weekly_report'], $user->send_weekly_report);
        $this->assertEquals($data['send_timer_notifications'], $user->send_timer_notifications);
        $this->assertEquals($data['invitation'], $user->invitation);
        $this->assertEquals($data['timezone'], $user->timezone);
        $this->assertEquals($data['duration_format'], $user->duration_format);
        $this->assertEquals($data['obm'], $user->obm);
        $this->assertEquals($data['used_next'], $user->used_next);
    }

    public function testItProperlyExtractsObjects()
    {
        $at = new \DateTime();
        $createdAt = new \DateTime();
        $newBlogPost = new BlogPost(array('title' => 'Title', 'url' => 'www.test.com'));
        $lastBlogPost = new BlogPost(array('title' => 'Title', 'url' => 'www.test.com'));

        $user = new User(
            array(
                'id'                        => 123,
                'api_token'                 => "api_token",
                'default_wid'               => 345,
                'fullname'                  => "Test fullname",
                'email'                     => "test@test.com",
                'jquery_timeofday_format'   => "dd/mm/yyyy",
                'jquery_date_format'        => "dd/mm/yyyy",
                'timeofday_format'          => "dd/mm/yyyy",
                'date_format'               => "dd/mm/yyyy",
                'store_start_and_stop_time' => false,
                'beginning_of_week'         => 1,
                'language'                  => "HR",
                'image_url'                 => "www.test.com",
                'sidebar_piechart'          => true,
                'at'                        => $at->format('c'),
                'created_at'                => $createdAt->format('c'),
                'retention'                 => 34,
                'record_timeline'           => true,
                'render_timeline'           => true,
                'timeline_enabled'          => true,
                'timeline_experiment'       => true,
                'manual_mode'               => true,
                'should_upgrade'            => true,
                'achievements_enabled'      => true,
                'openid_enabled'            => true,
                'new_blog_post'             => $newBlogPost,
                'last_blog_entry'           => $lastBlogPost,
                'send_product_emails'       => true,
                'send_weekly_report'        => true,
                'send_timer_notifications'  => true,
                'invitation'                => true,
                'timezone'                  => 'Europe\Zagreb',
                'duration_format'           => 'dd/mm/yyyy',
                'obm'                       => 'obm',
                'used_next'                 => true,
            )
        );

        $data = $this->hydrator->extract($user);

        $this->assertEquals($user->id, $data['id']);
        $this->assertEquals($user->api_token, $data['api_token']);
        $this->assertEquals($user->default_wid, $data['default_wid']);
        $this->assertEquals($user->fullname, $data['fullname']);
        $this->assertEquals($user->email, $data['email']);
        $this->assertEquals($user->jquery_timeofday_format, $data['jquery_timeofday_format']);
        $this->assertEquals($user->jquery_date_format, $data['jquery_date_format']);
        $this->assertEquals($user->timeofday_format, $data['timeofday_format']);
        $this->assertEquals($user->date_format, $data['date_format']);
        $this->assertEquals($user->store_start_and_stop_time, $data['store_start_and_stop_time']);
        $this->assertEquals($user->beginning_of_week, $data['beginning_of_week']);
        $this->assertEquals($user->language, $data['language']);
        $this->assertEquals($user->image_url, $data['image_url']);
        $this->assertEquals($user->sidebar_piechart, $data['sidebar_piechart']);
        $this->assertEquals($user->at, $data['at']);
        $this->assertEquals($user->created_at, $data['created_at']);
        $this->assertEquals($user->retention, $data['retention']);
        $this->assertEquals($user->record_timeline, $data['record_timeline']);
        $this->assertEquals($user->render_timeline, $data['render_timeline']);
        $this->assertEquals($user->timeline_enabled, $data['timeline_enabled']);
        $this->assertEquals($user->timeline_experiment, $data['timeline_experiment']);
        $this->assertEquals($user->manual_mode, $data['manual_mode']);
        $this->assertEquals($user->should_upgrade, $data['should_upgrade']);
        $this->assertEquals($user->achievements_enabled, $data['achievements_enabled']);
        $this->assertEquals($user->openid_enabled, $data['openid_enabled']);
        $this->assertEquals(array('title' => 'Title', 'url' => 'www.test.com'), $data['new_blog_post']);
        $this->assertEquals(array('title' => 'Title', 'url' => 'www.test.com'), $data['last_blog_entry']);
        $this->assertEquals($user->send_product_emails, $data['send_product_emails']);
        $this->assertEquals($user->send_weekly_report, $data['send_weekly_report']);
        $this->assertEquals($user->send_timer_notifications, $data['send_timer_notifications']);
        $this->assertEquals($user->invitation, $data['invitation']);
        $this->assertEquals($user->timezone, $data['timezone']);
        $this->assertEquals($user->duration_format, $data['duration_format']);
        $this->assertEquals($user->obm, $data['obm']);
        $this->assertEquals($user->used_next, $data['used_next']);
    }
}
