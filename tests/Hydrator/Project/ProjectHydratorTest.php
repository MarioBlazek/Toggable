<?php

namespace Marek\Toggable\Tests\Hydrator\Project;

use Marek\Toggable\API\Toggl\Values\Project\Project;
use Marek\Toggable\API\Toggl\Values\Tag\Tag;
use Marek\Toggable\API\Toggl\Values\Task\Task;
use Marek\Toggable\Hydrator\Project\ProjectHydrator;

class ProjectHydratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ProjectHydrator
     */
    private $hydrator;

    public function setUp()
    {
        $this->hydrator = new ProjectHydrator();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Marek\Toggable\Hydrator\HydratorInterface', $this->hydrator);
    }

    public function testCanHydrate()
    {
        $this->assertTrue($this->hydrator->canHydrate(new Project()));
        $this->assertFalse($this->hydrator->canHydrate(new Tag()));
        $this->assertFalse($this->hydrator->canHydrate(new Task()));
    }

    public function testItProperlyHydratesData()
    {
        $at = new \DateTime();
        $createdAt = new \DateTime();
        $serverDeletedAt = new \DateTime();

        $data = array(
            'id'                => 123,
            'name'              => 'Name test',
            'wid'               => 456,
            'guid'              => 789,
            'cid'               => 789,
            'active'            => true,
            'is_private'        => true,
            'template'          => false,
            'template_id'       => 123,
            'billable'          => true,
            'actual_hours'      => 3234,
            'auto_estimates'    => true,
            'estimated_hours'   => 2324,
            'at'                => $at->format('c'),
            'color'             => 45,
            'rate'              => 4.5,
            'created_at'        => $createdAt->format('c'),
            'server_deleted_at' => $serverDeletedAt->format('c'),
        );

        /** @var Project $project */
        $project = $this->hydrator->hydrate($data, new Project());

        $this->assertEquals($data['id'], $project->id);
        $this->assertEquals($data['name'], $project->name);
        $this->assertEquals($data['wid'], $project->wid);
        $this->assertEquals($data['guid'], $project->guid);
        $this->assertEquals($data['cid'], $project->cid);
        $this->assertEquals($data['active'], $project->active);
        $this->assertEquals($data['is_private'], $project->is_private);
        $this->assertEquals($data['template'], $project->template);
        $this->assertEquals($data['template_id'], $project->template_id);
        $this->assertEquals($data['billable'], $project->billable);
        $this->assertEquals($data['actual_hours'], $project->actual_hours);
        $this->assertEquals($data['auto_estimates'], $project->auto_estimates);
        $this->assertEquals($data['estimated_hours'], $project->estimated_hours);
        $this->assertEquals($data['at'], $project->at->format('c'));
        $this->assertEquals($data['color'], $project->color);
        $this->assertEquals($data['rate'], $project->rate);
        $this->assertEquals($data['created_at'], $project->created_at->format('c'));
        $this->assertEquals($data['server_deleted_at'], $project->server_deleted_at->format('c'));
    }

    public function testItProperlyExtractsObjects()
    {
        $at = new \DateTime();
        $createdAt = new \DateTime();
        $serverDeletedAt = new \DateTime();

        $project = new Project(
             array(
                'id'                => 123,
                'name'              => 'Name test',
                'wid'               => 456,
                'guid'              => 789,
                'cid'               => 789,
                'active'            => true,
                'is_private'        => true,
                'template'          => false,
                'template_id'       => 123,
                'billable'          => true,
                'actual_hours'      => 3234,
                'auto_estimates'    => true,
                'estimated_hours'   => 2324,
                'at'                => $at,
                'color'             => 45,
                'rate'              => 4.5,
                'created_at'        => $createdAt,
                'server_deleted_at' => $serverDeletedAt,
            )
        );

        $data = $this->hydrator->extract($project);

        $this->assertEquals($project->id, $data['id']);
        $this->assertEquals($project->name, $data['name']);
        $this->assertEquals($project->wid, $data['wid']);
        $this->assertEquals($project->guid, $data['guid']);
        $this->assertEquals($project->cid, $data['cid']);
        $this->assertEquals($project->active, $data['active']);
        $this->assertEquals($project->is_private, $data['is_private']);
        $this->assertEquals($project->template, $data['template']);
        $this->assertEquals($project->template_id, $data['template_id']);
        $this->assertEquals($project->billable, $data['billable']);
        $this->assertEquals($project->actual_hours, $data['actual_hours']);
        $this->assertEquals($project->auto_estimates, $data['auto_estimates']);
        $this->assertEquals($project->estimated_hours, $data['estimated_hours']);
        $this->assertEquals($project->at->format('c'), $data['at']);
        $this->assertEquals($project->color, $data['color']);
        $this->assertEquals($project->rate, $data['rate']);
        $this->assertEquals($project->created_at->format('c'), $data['created_at']);
        $this->assertEquals($project->server_deleted_at->format('c'), $data['server_deleted_at']);
    }
}
