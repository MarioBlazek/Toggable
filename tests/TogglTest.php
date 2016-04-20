<?php

namespace Marek\Toggable\Tests;

use Marek\Toggable\Factory\TogglFactory;
use Marek\Toggable\TogglInterface;

class TogglTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TogglInterface
     */
    private $toggl;

    public function setUp()
    {
        parent::setUp();
        $config = __DIR__.'/../config.php';
        $this->toggl = TogglFactory::buildToggable($config);
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\TogglInterface', $this->toggl);
    }

    public function testItReturnsAuthenticationService()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Toggl\AuthenticationServiceInterface', $this->toggl->getAuthenticationService());
    }

    public function testItReturnsClientService()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Toggl\ClientServiceInterface', $this->toggl->getClientService());
    }

    public function testItReturnsDashboardService()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Toggl\DashboardServiceInterface', $this->toggl->getDashboardService());
    }

    public function testItReturnsProjectService()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Toggl\ProjectServiceInterface', $this->toggl->getProjectService());
    }

    public function testItReturnsProjectUsersService()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Toggl\ProjectUsersServiceInterface', $this->toggl->getProjectUsersService());
    }

    public function testItReturnsTagService()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Toggl\TagServiceInterface', $this->toggl->getTagService());
    }

    public function testItReturnsTaskService()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Toggl\TaskServiceInterface', $this->toggl->getTaskService());
    }

    public function testItReturnsTimeEntryService()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Toggl\TimeEntryServiceInterface', $this->toggl->getTimeEntryService());
    }

    public function testItReturnsUserService()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Toggl\UserServiceInterface', $this->toggl->getUserService());
    }

    public function testItReturnsWorkspaceService()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Toggl\WorkspaceServiceInterface', $this->toggl->getWorkspaceService());
    }

    public function testItReturnsWorkspaceUsersService()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Toggl\WorkspaceUsersServiceInterface', $this->toggl->getWorkspaceUsersService());
    }
}
