<?php

namespace Marek\Toggable\Factory\Hydrator;

use Marek\Toggable\Factory\FactoryInterface;
use Marek\Toggable\Hydrator\AggregateHydrator;
use Marek\Toggable\Hydrator\Client\ClientHydrator;
use Marek\Toggable\Hydrator\Dashboard\ActivityHydrator;
use Marek\Toggable\Hydrator\Dashboard\MostActiveUserHydrator;
use Marek\Toggable\Hydrator\Project\ProjectHydrator;
use Marek\Toggable\Hydrator\Project\UserHydrator as ProjectUserHydrator;
use Marek\Toggable\Hydrator\Tag\TagHydrator;
use Marek\Toggable\Hydrator\Task\TaskHydrator;
use Marek\Toggable\Hydrator\TimeEntry\TimeEntryHydrator;
use Marek\Toggable\Hydrator\User\UserHydrator;
use Marek\Toggable\Hydrator\Workspace\SubscriptionHydrator;
use Marek\Toggable\Hydrator\Workspace\UserHydrator as WorkspaceUserHydrator;
use Marek\Toggable\Hydrator\Workspace\WorkspaceHydrator;

/**
 * Class HydratorFactory
 * @package Marek\Toggable\Factory\Hydrator
 */
class HydratorFactory implements FactoryInterface
{
    /**
     * @inheritDoc
     */
    public function build()
    {
        $aggregateHydrator = new AggregateHydrator();
        $aggregateHydrator->add(new ClientHydrator());
        $aggregateHydrator->add(new ActivityHydrator());
        $aggregateHydrator->add(new MostActiveUserHydrator());
        $aggregateHydrator->add(new ProjectHydrator());
        $aggregateHydrator->add(new ProjectUserHydrator());
        $aggregateHydrator->add(new TagHydrator());
        $aggregateHydrator->add(new TaskHydrator());
        $aggregateHydrator->add(new TimeEntryHydrator());
        $aggregateHydrator->add(new UserHydrator());
        $aggregateHydrator->add(new SubscriptionHydrator());
        $aggregateHydrator->add(new WorkspaceUserHydrator());
        $aggregateHydrator->add(new WorkspaceHydrator());

        return $aggregateHydrator;
    }
}
