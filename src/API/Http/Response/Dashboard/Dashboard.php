<?php

namespace Marek\Toggable\API\Http\Response\Dashboard;

use Marek\Toggable\API\Http\Response\Response;

/**
 * Class Dashboard
 * @package Marek\Toggable\API\Http\Response\Dashboard
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Dashboard\Dashboard $dashboard
 */
class Dashboard extends Response
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\Dashboard\Dashboard
     */
    public $dashboard;
}
