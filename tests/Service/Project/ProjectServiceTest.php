<?php

namespace Marek\Toggable\Tests\Service\Project;

use Marek\Toggable\API\Http\Response\Response;
use Marek\Toggable\API\Toggl\Values\Project\Project;
use Marek\Toggable\Http\Manager\NativeRequestManager;
use Marek\Toggable\Hydrator\Project\ProjectHydrator;
use Marek\Toggable\Service\Project\ProjectService;

class ProjectServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testGetProjectData()
    {
        $data = array(
            'wid' => 123456,
            'name' => 'Test name',
        );

        $project = new Project($data);

        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        'Test'
                    ),
                ),
            )
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $requestManager->expects($this->once())
            ->method('request')
            ->willReturn($response);

        $hydrator = $this->getMockBuilder(ProjectHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($project);


        $projectService = new ProjectService($requestManager, $hydrator);

        $response = $projectService->getProjectData(123);

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\Project\Project::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetProjectDataWithException()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(ProjectHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();


        $projectService = new ProjectService($requestManager, $hydrator);

        $projectService->getProjectData('test');
    }

    public function testCreateProject()
    {
        $data = array(
            'wid' => 123456,
            'name' => 'Test name',
        );

        $project = new Project($data);

        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        'Test'
                    ),
                ),
            )
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $requestManager->expects($this->once())
            ->method('request')
            ->willReturn($response);

        $hydrator = $this->getMockBuilder(ProjectHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('extract')
            ->willReturn($data);

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($project);


        $projectService = new ProjectService($requestManager, $hydrator);

        $response = $projectService->createProject($project);

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\Project\Project::class, $response);
    }

    public function testUpdateProject()
    {
        $data = array(
            'wid' => 123456,
            'name' => 'Test name',
        );

        $project = new Project($data);

        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        'Test'
                    ),
                ),
            )
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $requestManager->expects($this->once())
            ->method('request')
            ->willReturn($response);

        $hydrator = $this->getMockBuilder(ProjectHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('extract')
            ->willReturn($data);

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($project);


        $projectService = new ProjectService($requestManager, $hydrator);

        $response = $projectService->updateProject($project);

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\Project\Project::class, $response);
    }

    public function testDeleteProject()
    {
        $data = array(
            'wid' => 123456,
            'name' => 'Test name',
        );

        $project = new Project($data);

        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        'Test'
                    ),
                ),
            )
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $requestManager->expects($this->once())
            ->method('request')
            ->willReturn($response);

        $hydrator = $this->getMockBuilder(ProjectHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $projectService = new ProjectService($requestManager, $hydrator);

        $response = $projectService->deleteProject(123);

        $this->assertInstanceOf(Response::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testDeleteProjectWithException()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(ProjectHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();


        $projectService = new ProjectService($requestManager, $hydrator);

        $projectService->deleteProject('test');
    }
}
