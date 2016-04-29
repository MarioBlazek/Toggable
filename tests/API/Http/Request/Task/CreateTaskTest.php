<?php

namespace Marek\Toggable\Tests\API\Http\Request\Task;

use Marek\Toggable\API\Http\Request\Task\CreateTask;

class CreateTaskTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CreateTask
     */
    private $request;

    public function setUp()
    {
        $this->request = new CreateTask(
            array(
                'data' => array('data'),
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testGetUri()
    {
        $this->assertEquals('tasks', $this->request->getUri());
    }

    public function testGetData()
    {
        $this->assertEquals(array('data'), $this->request->getData());
    }

    public function testJsonSerialize()
    {
        $this->assertEquals(array('task' => array('data')), $this->request->jsonSerialize());
    }

    public function testItReturnsPostForMethod()
    {
        $this->assertEquals('POST', $this->request->getMethod());
    }
}
