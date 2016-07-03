<?php

namespace Marek\Toggable\Tests\Hydrator;

use Marek\Toggable\Hydrator\AggregateHydrator;
use Marek\Toggable\Hydrator\HydratorInterface;

class AggregateHydratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AggregateHydrator
     */
    protected $hydrator;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $hydrator1;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $hydrator2;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $hydrator3;

    public function setUp()
    {
        $this->hydrator = new AggregateHydrator();
        $this->hydrator1 = $this->getMockBuilder(HydratorInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(array('canHydrate', 'hydrate', 'extract'))
            ->getMock();

        $this->hydrator2 = $this->getMockBuilder(HydratorInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(array('canHydrate', 'hydrate', 'extract'))
            ->getMock();

        $this->hydrator3 = $this->getMockBuilder(HydratorInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(array('canHydrate', 'hydrate', 'extract'))
            ->getMock();
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

        $this->hydrator1->method('canHydrate')
            ->willReturn(false);
        $this->hydrator1->expects($this->never())
            ->method('hydrate');

        $this->hydrator2->method('canHydrate')
            ->willReturn(true);
        $this->hydrator2->method('hydrate')
            ->willReturn($stdClass);

        $this->hydrator3->expects($this->never())
            ->method('hydrate');


        $this->hydrator->add($this->hydrator1);
        $this->hydrator->add($this->hydrator2);
        $this->hydrator->add($this->hydrator3);

        $result = $this->hydrator->hydrate(array(), new \stdClass());

        $this->assertSame($stdClass, $result);

        $this->assertNotEquals(1, $result);
    }

    public function testItProperlyUsesExtract()
    {
        $data = array(42);

        $this->hydrator1->method('canHydrate')
            ->willReturn(false);
        $this->hydrator1->expects($this->never())
            ->method('extract');

        $this->hydrator2->method('canHydrate')
            ->willReturn(true);
        $this->hydrator2->method('extract')
            ->willReturn($data);

        $this->hydrator3->expects($this->never())
            ->method('hydrate');


        $this->hydrator->add($this->hydrator1);
        $this->hydrator->add($this->hydrator2);
        $this->hydrator->add($this->hydrator3);

        $result = $this->hydrator->extract(new \stdClass());

        $this->assertSame($data, $result);

        $this->assertNotEquals(new \stdClass(), $result);
    }

    public function testItShouldReturnPassedDataIfNoAvailableHydratorsFound()
    {
        $this->hydrator1->method('canHydrate')
            ->willReturn(false);
        $this->hydrator1->expects($this->never())
            ->method('hydrate');

        $this->hydrator2->method('canHydrate')
            ->willReturn(false);
        $this->hydrator2->expects($this->never())
            ->method('hydrate');

        $this->hydrator->add($this->hydrator1);
        $this->hydrator->add($this->hydrator2);

        $result = $this->hydrator->hydrate(array(1, 2, 3), new \stdClass());

        $this->assertSame(array(1, 2, 3), $result);
    }

    public function testItShouldReturnPassedObjectIfNoAvailableHydratorsFound()
    {
        $object = new \stdClass();

        $this->hydrator1->method('canHydrate')
            ->willReturn(false);
        $this->hydrator1->expects($this->never())
            ->method('hydrate');

        $this->hydrator2->method('canHydrate')
            ->willReturn(false);
        $this->hydrator2->expects($this->never())
            ->method('hydrate');

        $this->hydrator->add($this->hydrator1);
        $this->hydrator->add($this->hydrator2);

        $result = $this->hydrator->extract($object);

        $this->assertSame($object, $result);
    }
}
