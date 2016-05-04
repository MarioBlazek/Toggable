<?php

namespace Marek\Toggable\Tests\API\Http\Request\TimeEntry;

use Marek\Toggable\API\Http\Request\TimeEntry\GetTimeEntry;

class GetTimeEntryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetTimeEntry
     */
    private $request;

    public function setUp()
    {
        $this->request = new GetTimeEntry(
            array(
                'timeEntryId' => 123,
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testGeneratesValidUri()
    {
        $this->assertEquals('time_entries/123', $this->request->getUri());
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
