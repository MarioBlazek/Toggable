<?php

namespace Marek\Toggable\Tests\API\Http\Request\TimeEntry;

use Marek\Toggable\API\Http\Request\TimeEntry\StartTimeEntry;

class StartTimeEntryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var StartTimeEntry
     */
    private $request;

    public function setUp()
    {
        $this->request = new StartTimeEntry(
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
        $this->assertEquals('time_entries/start', $this->request->getUri());
    }

    public function testGetData()
    {
        $this->assertEquals(array('data'), $this->request->getData());
    }

    public function testJsonSerialize()
    {
        $this->assertEquals(array('time_entry' => array('data')), $this->request->jsonSerialize());
    }

    public function testItReturnsPostForMethod()
    {
        $this->assertEquals('POST', $this->request->getMethod());
    }
}
