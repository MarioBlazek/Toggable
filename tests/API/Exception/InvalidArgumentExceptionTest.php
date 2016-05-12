<?php

namespace Marek\Toggable\Tests\API\Exception;

use Marek\Toggable\API\Exception\InvalidArgumentException;

class InvalidArgumentExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Marek\Toggable\API\Exception\InvalidArgumentException
     * @expectedExceptionMessage $some_property argument not provided in TestClass
     */
    public function testException()
    {
        $exception = new InvalidArgumentException('some_property', 'TestClass');
        throw  $exception;
    }
}
