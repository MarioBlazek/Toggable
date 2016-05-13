<?php

namespace Marek\Toggable\Tests\Hydrator;

use Marek\Toggable\API\Toggl\Values\Dashboard\MostActiveUser;
use Marek\Toggable\Hydrator\ObjectProperty;

class ObjectPropertyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ObjectProperty
     */
    private $hydrator;

    public function setUp()
    {
        $this->hydrator = new ObjectProperty();
    }

    /**
     * @expectedException \BadMethodCallException
     */
    public function testHydratorExtractThrowsExceptionOnNonObjectParameter()
    {
        $this->hydrator->extract('thisIsNotAnObject');
    }

    public function testCanExtractFromStdClass()
    {
        $object = new \stdClass();
        $object->foo = 'bar';
        $this->assertSame(['foo' => 'bar'], $this->hydrator->extract($object));
    }

    /**
     * @expectedException \BadMethodCallException
     */
    public function testIfSecondArgumentIsNotAnObjectExceptionShouldBeThrown()
    {
        $this->hydrator->hydrate(array(), array());
    }

    public function testCanExtractFromGenericClass()
    {
        $data = array(
            'user_id' => 123,
            'duration' => 45,
        );

        $mostActiveUser = new MostActiveUser($data);

        $this->assertSame($data, $this->hydrator->extract($mostActiveUser));
    }

    public function testItIgnoresNonObjectProperty()
    {
        $data = array(
            'user_id' => 123,
            'duration' => 45,
            'kifla' => 34,
        );

        $extractedResult = array(
            'user_id' => 123,
            'duration' => 45,
        );

        $mostActiveUser = new MostActiveUser($extractedResult);

        $this->assertEquals($mostActiveUser, $this->hydrator->hydrate($data, new MostActiveUser()));
    }

    public function testRemovingStrategies()
    {
        $strategy = $this->getMockForAbstractClass('Marek\Toggable\Hydrator\StrategyInterface');

        $this->hydrator->addStrategy('strategy_one', $strategy);
        $this->hydrator->addStrategy('strategy_two', $strategy);

        $this->hydrator->removeStrategy('strategy_one');

        $this->assertFalse($this->hydrator->hasStrategy('strategy_one'));
        $this->assertTrue($this->hydrator->hasStrategy('strategy_two'));
    }

    public function testAddingStrategies()
    {
        $strategy = $this->getMockForAbstractClass('Marek\Toggable\Hydrator\StrategyInterface');

        $this->hydrator->addStrategy('strategy_one', $strategy);
        $this->hydrator->addStrategy('strategy_two', $strategy);

        $this->assertTrue($this->hydrator->hasStrategy('strategy_one'));
        $this->assertTrue($this->hydrator->hasStrategy('strategy_two'));
    }

    public function testCheckingForStrategies()
    {
        $strategy = $this->getMockForAbstractClass('Marek\Toggable\Hydrator\StrategyInterface');

        $this->hydrator->addStrategy('strategy_one', $strategy);

        $this->assertTrue($this->hydrator->hasStrategy('strategy_one'));
        $this->assertFalse($this->hydrator->hasStrategy('strategy_two'));
    }

    public function testGettingStrategies()
    {
        $strategy = $this->getMockForAbstractClass('Marek\Toggable\Hydrator\StrategyInterface');

        $this->hydrator->addStrategy('strategy_one', $strategy);
        $this->hydrator->addStrategy('strategy_two', $strategy);

        $this->assertSame($strategy, $this->hydrator->getStrategy('strategy_one'));
        $this->assertSame($strategy, $this->hydrator->getStrategy('strategy_two'));
    }

    public function testCanHydrateShouldAlwaysReturnTrue()
    {
        $this->assertTrue($this->hydrator->canHydrate(new \stdClass()));
    }
}
