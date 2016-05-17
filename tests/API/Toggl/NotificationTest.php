<?php

namespace Marek\Toggable\Tests\API\Toggl;

use Marek\Toggable\API\Toggl\Values\Notification;

class NotificationTest extends \PHPUnit_Framework_TestCase
{
    private $valueObject;

    public function setUp()
    {
        $this->valueObject = new Notification(array('message' => 'test'));
    }

    public function testInstaceOf()
    {
        $this->assertInstanceOf('Marek\Toggable\API\Toggl\Values\ValueObject', $this->valueObject);
    }

    public function testItReturnsProperty()
    {
        $this->assertEquals('test', $this->valueObject->message);
    }

    /**
     * @expectedException \Marek\Toggable\API\Exception\PropertyNotFoundException
     * @expectedExceptionMessage Property 'test' not found on class 'Marek\Toggable\API\Toggl\Values\Notification'
     */
    public function testItThrowsExceptionOnRetrievalOfNonExistingProperty()
    {
        $this->valueObject->test;
    }

    public function testIsSet()
    {
        $this->assertTrue(isset($this->valueObject->message));
    }
}
