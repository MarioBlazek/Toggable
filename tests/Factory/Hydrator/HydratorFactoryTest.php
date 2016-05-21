<?php

namespace Marek\Toggable\Tests\Factory\Hydrator;

use Marek\Toggable\Factory\FactoryInterface;
use Marek\Toggable\Factory\Hydrator\HydratorFactory;

class HydratorFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testInstanceOfFactoryInterface()
    {
        $this->assertInstanceOf(FactoryInterface::class, new HydratorFactory());
    }

    public function testItReturnsAggregateHydrator()
    {
        $factory = new HydratorFactory();
        $this->assertInstanceOf('Marek\Toggable\Hydrator\AggregateHydrator', $factory->build());
    }
}
