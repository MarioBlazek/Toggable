<?php

namespace Marek\Toggable\Tests\API\Http\Request\Task;

use Marek\Toggable\API\Http\Request\Task\DeleteTask;

class DeleteTaskTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DeleteTask
     */
    private $request;

    public function setUp()
    {
        $this->request = new DeleteTask(
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

    public function testItReturnsDeleteForMethod()
    {
        $this->assertEquals('DELETE', $this->request->getMethod());
    }
}
