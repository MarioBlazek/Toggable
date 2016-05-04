<?php

namespace Marek\Toggable\Tests\API\Http\Request\TimeEntry;

use Marek\Toggable\API\Http\Request\TimeEntry\CreateTimeEntry;

class CreateTimeEntryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CreateTimeEntry
     */
    private $request;

    public function setUp()
    {
        $this->request = new CreateTimeEntry(
            array(
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
        $this->assertEquals('time_entries', $this->request->getUri());
    }

    public function testItReturnsPostForMethod()
    {
        $this->assertEquals('POST', $this->request->getMethod());
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
