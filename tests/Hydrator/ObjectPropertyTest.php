<?php

namespace Marek\Toggable\Tests\Hydrator;

use Marek\Toggable\API\Toggl\Values\Dashboard\MostActiveUser;
use Marek\Toggable\Hydrator\ObjectProperty;
use Zend\Hydrator\Exception\BadMethodCallException;

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
     * @expectedException BadMethodCallException
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

    public function testCanExtractFromGenericClass()
    {
        $data = array(
            'user_id' => 123,
            'duration' => 45,
        );

        $mostActiveUser = new MostActiveUser($data);

        $this->assertSame($data, $this->hydrator->extract($mostActiveUser));
    }
}
