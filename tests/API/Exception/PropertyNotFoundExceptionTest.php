<?php

namespace Marek\Toggable\Tests\API\Exception;

use Marek\Toggable\API\Exception\PropertyNotFoundException;

class PropertyNotFoundExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Marek\Toggable\API\Exception\PropertyNotFoundException
     * @expectedExceptionMessage Property 'some_property' not found
     */
    public function testExceptionIfClassNameIsNull()
    {
        $exception = new PropertyNotFoundException('some_property');
        throw  $exception;
    }

    /**
     * @expectedException \Marek\Toggable\API\Exception\PropertyNotFoundException
     * @expectedExceptionMessage Property 'some_property' not found on class 'TestClass'
     */
    public function testExceptionWithAllParams()
    {
        $exception = new PropertyNotFoundException('some_property', 'TestClass');
        throw  $exception;
    }
}
