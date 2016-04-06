<?php

namespace Marek\Toggable\API\Toggl;

/**
 * Interface DashboardServiceInterface
 * @package Marek\Toggable\API\Toggl
 */
interface DashboardServiceInterface
{
    /**
     * Get dashboard data by workspace id
     *
     * @param int $workspaceId
     *
     * @return \Marek\Toggable\API\Http\Response\Dashboard\Dashboard
     */
    public function getDashboardData($workspaceId);
}
