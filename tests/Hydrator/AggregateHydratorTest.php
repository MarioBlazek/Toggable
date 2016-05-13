<?php

namespace Marek\Toggable\Tests\Hydrator;

use Marek\Toggable\Hydrator\AggregateHydrator;

class AggregateHydratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AggregateHydrator
     */
    private $hydrator;

    public function setUp()
    {
        $this->hydrator = new AggregateHydrator();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Marek\Toggable\Hydrator\HydratorInterface', $this->hydrator);
    }

    public function testCanHydrateShouldAlwaysReturnTrue()
    {
        $this->assertTrue($this->hydrator->canHydrate(new \stdClass()));
    }

    public function testItProperlyUsesHydrate()
    {
        $stdClass = new \stdClass();
        $hydrator1 = $this->getMock('Marek\Toggable\Hydrator\HydratorInterface', array('canHydrate', 'hydrate', 'extract'));
        $hydrator1->method('canHydrate')
            ->willReturn(false);
        $hydrator1->expects($this->never())
            ->method('hydrate');

        $hydrator2 = $this->getMock('Marek\Toggable\Hydrator\HydratorInterface', array('canHydrate', 'hydrate', 'extract'));
        $hydrator2->method('canHydrate')
            ->willReturn(true);
        $hydrator2->method('hydrate')
            ->willReturn($stdClass);

        $hydrator3 = $this->getMock('Marek\Toggable\Hydrator\HydratorInterface', array('canHydrate', 'hydrate', 'extract'));
        $hydrator3->expects($this->never())
            ->method('hydrate');


        $this->hydrator->add($hydrator1);
        $this->hydrator->add($hydrator2);
        $this->hydrator->add($hydrator3);

        $result = $this->hydrator->hydrate(array(), new \stdClass());

        $this->assertSame($stdClass, $result);

        $this->assertNotEquals(1, $result);
    }

    public function testItProperlyUsesExtract()
    {
        $data = array(42);
        $hydrator1 = $this->getMock('Marek\Toggable\Hydrator\HydratorInterface', array('canHydrate', 'hydrate', 'extract'));
        $hydrator1->method('canHydrate')
            ->willReturn(false);
        $hydrator1->expects($this->never())
            ->method('extract');

        $hydrator2 = $this->getMock('Marek\Toggable\Hydrator\HydratorInterface', array('canHydrate', 'hydrate', 'extract'));
        $hydrator2->method('canHydrate')
            ->willReturn(true);
        $hydrator2->method('extract')
            ->willReturn($data);

        $hydrator3 = $this->getMock('Marek\Toggable\Hydrator\HydratorInterface', array('canHydrate', 'hydrate', 'extract'));
        $hydrator3->expects($this->never())
            ->method('hydrate');


        $this->hydrator->add($hydrator1);
        $this->hydrator->add($hydrator2);
        $this->hydrator->add($hydrator3);

        $result = $this->hydrator->extract(new \stdClass());

        $this->assertSame($data, $result);

        $this->assertNotEquals(new \stdClass(), $result);
    }

    public function testItShouldReturnPassedDataIfNoAvailableHydratorsFound()
    {
        $hydrator1 = $this->getMock('Marek\Toggable\Hydrator\HydratorInterface', array('canHydrate', 'hydrate', 'extract'));
        $hydrator1->method('canHydrate')
            ->willReturn(false);
        $hydrator1->expects($this->never())
            ->method('hydrate');

        $hydrator2 = $this->getMock('Marek\Toggable\Hydrator\HydratorInterface', array('canHydrate', 'hydrate', 'extract'));
        $hydrator2->method('canHydrate')
            ->willReturn(false);
        $hydrator2->expects($this->never())
            ->method('hydrate');

        $this->hydrator->add($hydrator1);
        $this->hydrator->add($hydrator2);

        $result = $this->hydrator->hydrate(array(1, 2, 3), new \stdClass());

        $this->assertSame(array(1, 2, 3), $result);
    }

    public function testItShouldReturnPassedObjectIfNoAvailableHydratorsFound()
    {
        $object = new \stdClass();
        $hydrator1 = $this->getMock('Marek\Toggable\Hydrator\HydratorInterface', array('canHydrate', 'hydrate', 'extract'));
        $hydrator1->method('canHydrate')
            ->willReturn(false);
        $hydrator1->expects($this->never())
            ->method('hydrate');

        $hydrator2 = $this->getMock('Marek\Toggable\Hydrator\HydratorInterface', array('canHydrate', 'hydrate', 'extract'));
        $hydrator2->method('canHydrate')
            ->willReturn(false);
        $hydrator2->expects($this->never())
            ->method('hydrate');

        $this->hydrator->add($hydrator1);
        $this->hydrator->add($hydrator2);

        $result = $this->hydrator->extract($object);

        $this->assertSame($object, $result);
    }
}
