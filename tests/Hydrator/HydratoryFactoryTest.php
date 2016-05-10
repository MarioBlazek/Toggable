<?php

namespace Marek\Toggable\Tests\Hydrator;

use Marek\Toggable\Hydrator\HydratorFactory;

class HydratoryFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testItReturnsAggregateHydrator()
    {
        $this->assertInstanceOf('Marek\Toggable\Hydrator\AggregateHydrator', HydratorFactory::createHydrator());
    }
}
