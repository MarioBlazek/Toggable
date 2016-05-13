<?php

namespace Marek\Toggable\Tests\Hydrator\Workspace;

use Marek\Toggable\API\Toggl\Values\Dashboard\Activity;
use Marek\Toggable\API\Toggl\Values\Tag\Tag;
use Marek\Toggable\API\Toggl\Values\Workspace\Workspace;
use Marek\Toggable\Hydrator\Workspace\WorkspaceHydrator;

class WorkspaceHydratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var WorkspaceHydrator
     */
    private $hydrator;

    public function setUp()
    {
        $this->hydrator = new WorkspaceHydrator();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Marek\Toggable\Hydrator\HydratorInterface', $this->hydrator);
    }

    public function testCanHydrate()
    {
        $this->assertFalse($this->hydrator->canHydrate(new Activity()));
        $this->assertFalse($this->hydrator->canHydrate(new Tag()));
        $this->assertTrue($this->hydrator->canHydrate(new Workspace()));
    }

    public function testItProperlyHydratesData()
    {
        $at = new \DateTime();

        $data = array(
            'id'                                => 123,
            'name'                              => "Test name",
            'profile'                           => 456,
            'premium'                           => true,
            'admin'                             => true,
            'default_hourly_rate'               => 4.5,
            'default_currency'                  => "HRK",
            'only_admins_may_create_projects'   => true,
            'only_admins_see_billable_rates'    => true,
            'only_admins_see_team_dashboard'    => true,
            'projects_billable_by_default'      => true,
            'rounding'                          => 1,
            'rounding_minutes'                  => 1,
            'at'                                => $at->format('c'),
            'logo_url'                          => "www.test.com",
            'api_token'                         => "apitoken",
            'ical_enabled'                      => true,
            'ical_url'                          => "www.test.com",
            'subscription'                      => true,
            'campaign'                          => true,
            'business_tester'                   => true,
        );

        /** @var Workspace $workspace */
        $workspace = $this->hydrator->hydrate($data, new Workspace());

        $this->assertEquals($data['id'], $workspace->id);
        $this->assertEquals($data['name'], $workspace->name);
        $this->assertEquals($data['profile'], $workspace->profile);
        $this->assertEquals($data['premium'], $workspace->premium);
        $this->assertEquals($data['admin'], $workspace->admin);
        $this->assertEquals($data['default_hourly_rate'], $workspace->default_hourly_rate);
        $this->assertEquals($data['default_currency'], $workspace->default_currency);
        $this->assertEquals($data['only_admins_may_create_projects'], $workspace->only_admins_may_create_projects);
        $this->assertEquals($data['only_admins_see_billable_rates'], $workspace->only_admins_see_billable_rates);
        $this->assertEquals($data['only_admins_see_team_dashboard'], $workspace->only_admins_see_team_dashboard);
        $this->assertEquals($data['projects_billable_by_default'], $workspace->projects_billable_by_default);
        $this->assertEquals($data['rounding'], $workspace->rounding);
        $this->assertEquals($data['rounding_minutes'], $workspace->rounding_minutes);
        $this->assertEquals($data['at'], $workspace->at->format('c'));
        $this->assertEquals($data['logo_url'], $workspace->logo_url);
        $this->assertEquals($data['api_token'], $workspace->api_token);
        $this->assertEquals($data['ical_enabled'], $workspace->ical_enabled);
        $this->assertEquals($data['ical_url'], $workspace->ical_url);
        $this->assertEquals($data['subscription'], $workspace->subscription);
        $this->assertEquals($data['campaign'], $workspace->campaign);
        $this->assertEquals($data['business_tester'], $workspace->business_tester);
    }

    public function testItProperlyExtractsObjects()
    {
        $at = new \DateTime();

        $workspace = new Workspace(
            array(
                'id'                                => 123,
                'name'                              => "Test name",
                'profile'                           => 456,
                'premium'                           => true,
                'admin'                             => true,
                'default_hourly_rate'               => 4.5,
                'default_currency'                  => "HRK",
                'only_admins_may_create_projects'   => true,
                'only_admins_see_billable_rates'    => true,
                'only_admins_see_team_dashboard'    => true,
                'projects_billable_by_default'      => true,
                'rounding'                          => 1,
                'rounding_minutes'                  => 1,
                'at'                                => $at,
                'logo_url'                          => "www.test.com",
                'api_token'                         => "apitoken",
                'ical_enabled'                      => true,
                'ical_url'                          => "www.test.com",
                'subscription'                      => true,
                'campaign'                          => true,
                'business_tester'                   => true,
            )
        );

        $data = $this->hydrator->extract($workspace);

        $this->assertEquals($workspace->id, $data['id']);
        $this->assertEquals($workspace->name, $data['name']);
        $this->assertEquals($workspace->profile, $data['profile']);
        $this->assertEquals($workspace->premium, $data['premium']);
        $this->assertEquals($workspace->admin, $data['admin']);
        $this->assertEquals($workspace->default_hourly_rate, $data['default_hourly_rate']);
        $this->assertEquals($workspace->default_currency, $data['default_currency']);
        $this->assertEquals($workspace->only_admins_may_create_projects, $data['only_admins_may_create_projects']);
        $this->assertEquals($workspace->only_admins_see_billable_rates, $data['only_admins_see_billable_rates']);
        $this->assertEquals($workspace->only_admins_see_team_dashboard, $data['only_admins_see_team_dashboard']);
        $this->assertEquals($workspace->projects_billable_by_default, $data['projects_billable_by_default']);
        $this->assertEquals($workspace->rounding, $data['rounding']);
        $this->assertEquals($workspace->rounding_minutes, $data['rounding_minutes']);
        $this->assertEquals($workspace->at->format('c'), $data['at']);
        $this->assertEquals($workspace->logo_url, $data['logo_url']);
        $this->assertEquals($workspace->api_token, $data['api_token']);
        $this->assertEquals($workspace->ical_enabled, $data['ical_enabled']);
        $this->assertEquals($workspace->ical_url, $data['ical_url']);
        $this->assertEquals($workspace->subscription, $data['subscription']);
        $this->assertEquals($workspace->campaign, $data['campaign']);
        $this->assertEquals($workspace->business_tester, $data['business_tester']);
    }
}
