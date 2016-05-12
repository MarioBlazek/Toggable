<?php

namespace Marek\Toggable\Tests\API\Exception\Http;

use Marek\Toggable\API\Exception\Http\BaseException;

class BaseExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Marek\Toggable\API\Exception\Http\BaseException
     * @expectedExceptionMessage Error message
     */
    public function testException()
    {
        $exception = new BaseException('Error message');
        throw  $exception;
    }
}
