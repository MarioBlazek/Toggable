<?php

namespace Marek\Toggable\Tests\API\Http\Request\Task;

use Marek\Toggable\API\Http\Request\Task\BulkUpdateTasks;

class BulkUpdateTasksTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BulkUpdateTasks
     */
    private $request;

    public function setUp()
    {
        $this->request = new BulkUpdateTasks(
            array(
                'data'  => array('data'),
                'taskIds' => array(123, 456, 789),
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testGeneratesValidUri()
    {
        $this->assertEquals('tasks/123,456,789', $this->request->getUri());
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
