<?php

namespace Marek\Toggable\Tests\API\Exception;

use Marek\Toggable\API\Exception\NotFoundException;

class NotFoundExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Marek\Toggable\API\Exception\NotFoundException
     * @expectedExceptionMessage No clients results returned from Toggl
     */
    public function testException()
    {
        $exception = new NotFoundException('clients');
        throw  $exception;
    }
}
