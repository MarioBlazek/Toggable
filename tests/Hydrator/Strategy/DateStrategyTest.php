<?php

namespace Marek\Toggable\Tests\Hydrator\Strategy;

use Marek\Toggable\Hydrator\Strategy\DateStrategy;

class DateStrategyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DateStrategy
     */
    private $strategy;

    public function setUp()
    {
        $this->strategy = new DateStrategy();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Marek\Toggable\Hydrator\StrategyInterface', $this->strategy);
    }

    public function testHydrate()
    {
        $date = new \DateTime();

        $hydrated = $this->strategy->hydrate($date->format('c'));

        $this->assertEquals($date, $hydrated);
    }

    public function testHydrateWhenNonStringIsPassed()
    {
        $date = new \DateTime();

        $hydrated = $this->strategy->hydrate($date);

        $this->assertEquals($date, $hydrated);
    }

    public function testExtract()
    {
        $date = new \DateTime();

        $extracted = $this->strategy->extract($date);

        $this->assertEquals($date->format('c'), $extracted);
    }

    public function testExtractWhenNonDateTimeObjectIsPassed()
    {
        $date = new \stdClass();

        $extracted = $this->strategy->extract($date);

        $this->assertEquals($date, $extracted);
    }
}
