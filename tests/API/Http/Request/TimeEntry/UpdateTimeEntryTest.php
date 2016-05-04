<?php

namespace Marek\Toggable\Tests\API\Http\Request\TimeEntry;

use Marek\Toggable\API\Http\Request\TimeEntry\UpdateTimeEntry;

class UpdateTimeEntryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UpdateTimeEntry
     */
    private $request;

    public function setUp()
    {
        $this->request = new UpdateTimeEntry(
            array(
                'timeEntryId' => 123,
                'data' => array('data'),
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testItGeneratesValidUri()
    {
        $this->assertEquals('time_entries/123', $this->request->getUri());
    }

    public function testItReturnsPutForMethod()
    {
        $this->assertEquals('PUT', $this->request->getMethod());
    }

    public function testGetData()
    {
        $this->assertEquals(array('data'), $this->request->getData());
    }

    public function testJsonSerialize()
    {
        $this->assertEquals(array('time_entry' => array('data')), $this->request->jsonSerialize());
    }
}
