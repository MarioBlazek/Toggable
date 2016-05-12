<?php

namespace Marek\Toggable\Tests\API\Exception;

use Marek\Toggable\API\Exception\PropertyReadOnlyException;

class PropertyReadOnlyExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Marek\Toggable\API\Exception\PropertyReadOnlyException
     * @expectedExceptionMessage Property 'some_property' is readonly
     */
    public function testExceptionIfClassNameIsNull()
    {
        $exception = new PropertyReadOnlyException('some_property');
        throw  $exception;
    }

    /**
     * @expectedException \Marek\Toggable\API\Exception\PropertyReadOnlyException
     * @expectedExceptionMessage Property 'some_property' is readonly on class 'TestClass'
     */
    public function testExceptionWithAllParams()
    {
        $exception = new PropertyReadOnlyException('some_property', 'TestClass');
        throw  $exception;
    }
}
