<?php

namespace Marek\Toggable\Tests\API\Http\Request\Task;

use Marek\Toggable\API\Http\Request\Task\GetTask;

class GetTaskTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetTask
     */
    private $request;

    public function setUp()
    {
        $this->request = new GetTask(
            array(
                'taskId' => 456,
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testGeneratesValidUri()
    {
        $this->assertEquals('tasks/456', $this->request->getUri());
    }

    public function testGetDataShouldReturnNull()
    {
        $this->assertNull($this->request->getData());
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testJsonSerializeShouldThrowRuntimeException()
    {
        $this->request->jsonSerialize();
    }

    public function testItReturnsGetForMethod()
    {
        $this->assertEquals('GET', $this->request->getMethod());
    }
}
