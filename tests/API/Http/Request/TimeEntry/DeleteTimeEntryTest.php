<?php

namespace Marek\Toggable\Tests\API\Http\Request\TimeEntry;

use Marek\Toggable\API\Http\Request\TimeEntry\DeleteTimeEntry;

class DeleteTimeEntryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DeleteTimeEntry
     */
    private $request;

    public function setUp()
    {
        $this->request = new DeleteTimeEntry(
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

    public function testItReturnsDeleteForMethod()
    {
        $this->assertEquals('DELETE', $this->request->getMethod());
    }
}
