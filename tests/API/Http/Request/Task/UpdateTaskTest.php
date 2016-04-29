<?php

namespace Marek\Toggable\Tests\API\Http\Request\Task;

use Marek\Toggable\API\Http\Request\Task\UpdateTask;

class UpdateTaskTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UpdateTask
     */
    private $request;

    public function setUp()
    {
        $this->request = new UpdateTask(
            array(
                'data'  => array('data'),
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

    public function testGetData()
    {
        $this->assertEquals(array('data'), $this->request->getData());
    }

    public function testJsonSerialize()
    {
        $this->assertEquals(array('task' => array('data')), $this->request->jsonSerialize());
    }

    public function testItReturnsPutForMethod()
    {
        $this->assertEquals('PUT', $this->request->getMethod());
    }
}
