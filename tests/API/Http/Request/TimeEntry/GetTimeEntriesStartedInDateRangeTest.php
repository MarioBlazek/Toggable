<?php

namespace Marek\Toggable\Tests\API\Http\Request\TimeEntry;

use Marek\Toggable\API\Http\Request\TimeEntry\GetTimeEntriesStartedInDateRange;

class GetTimeEntriesStartedInDateRangeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetTimeEntriesStartedInDateRange
     */
    private $request;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    public function setUp()
    {
        $startDate = new \DateTime('2 days ago');
        $endDate = new \DateTime('now');

        $this->request = new GetTimeEntriesStartedInDateRange(
            array(
                'startDate' => $startDate,
                'endDate' => $endDate,
            )
        );

        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testGeneratesValidUri()
    {
        $queryString = '?start_date=' . $this->startDate->format('c') . '&end_date=' . $this->endDate->format('c');

        $uri = urlencode('time_entries' . $queryString);

        $this->assertEquals($uri, $this->request->getUri());
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
