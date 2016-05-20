<?php

namespace Marek\Toggable\Tests\Service\TimeEntry;

use Marek\Toggable\API\Http\Response\Response;
use Marek\Toggable\API\Http\Response\ResponseInterface;
use Marek\Toggable\API\Toggl\Values\TagAction;
use Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry;
use Marek\Toggable\Http\Manager\NativeRequestManager;
use Marek\Toggable\Hydrator\TimeEntry\TimeEntryHydrator;
use Marek\Toggable\Service\TimeEntry\TimeEntryService;

class TimeEntryServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateTimeEntry()
    {
        $data = array(
            'id' => 123,
            'description' => 'Test description',
        );

        $timeEntry = new TimeEntry($data);

        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        'Test'
                    ),
                ),
            )
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $requestManager->expects($this->once())
            ->method('request')
            ->willReturn($response);

        $hydrator = $this->getMockBuilder(TimeEntryHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('extract')
            ->willReturn(array());

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($timeEntry);


        $timeEntryService = new TimeEntryService($requestManager, $hydrator);

        $response = $timeEntryService->createTimeEntry($timeEntry);

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\TimeEntry\TimeEntry::class, $response);
    }

    public function testStartTimeEntry()
    {
        $data = array(
            'id' => 123,
            'description' => 'Test description',
        );

        $timeEntry = new TimeEntry($data);

        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        'Test'
                    ),
                ),
            )
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $requestManager->expects($this->once())
            ->method('request')
            ->willReturn($response);

        $hydrator = $this->getMockBuilder(TimeEntryHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('extract')
            ->willReturn(array());

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($timeEntry);


        $timeEntryService = new TimeEntryService($requestManager, $hydrator);

        $response = $timeEntryService->startTimeEntry($timeEntry);

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\TimeEntry\TimeEntry::class, $response);
    }

    public function testStopTimeEntry()
    {
        $data = array(
            'id' => 123,
            'description' => 'Test description',
        );

        $timeEntry = new TimeEntry($data);

        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        'Test'
                    ),
                ),
            )
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $requestManager->expects($this->once())
            ->method('request')
            ->willReturn($response);

        $hydrator = $this->getMockBuilder(TimeEntryHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($timeEntry);


        $timeEntryService = new TimeEntryService($requestManager, $hydrator);

        $response = $timeEntryService->stopTimeEntry(123);

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\TimeEntry\TimeEntry::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testStopTimeEntryWithException()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(TimeEntryHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $timeEntryService = new TimeEntryService($requestManager, $hydrator);

        $timeEntryService->stopTimeEntry('test');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetTimeEntryWithException()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(TimeEntryHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $timeEntryService = new TimeEntryService($requestManager, $hydrator);

        $timeEntryService->getTimeEntry('test');
    }

    public function testGetTimeEntry()
    {
        $data = array(
            'id' => 123,
            'description' => 'Test description',
        );

        $timeEntry = new TimeEntry($data);

        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        'Test'
                    ),
                ),
            )
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $requestManager->expects($this->once())
            ->method('request')
            ->willReturn($response);

        $hydrator = $this->getMockBuilder(TimeEntryHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($timeEntry);


        $timeEntryService = new TimeEntryService($requestManager, $hydrator);

        $response = $timeEntryService->getTimeEntry(123);

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\TimeEntry\TimeEntry::class, $response);
    }

    public function testGetRunningTimeEntry()
    {
        $data = array(
            'id' => 123,
            'description' => 'Test description',
        );

        $timeEntry = new TimeEntry($data);

        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        'Test'
                    ),
                ),
            )
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $requestManager->expects($this->once())
            ->method('request')
            ->willReturn($response);

        $hydrator = $this->getMockBuilder(TimeEntryHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($timeEntry);


        $timeEntryService = new TimeEntryService($requestManager, $hydrator);

        $response = $timeEntryService->getRunningTimeEntry();

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\TimeEntry\TimeEntry::class, $response);
    }

    public function testUpdateTimeEntry()
    {
        $data = array(
            'id' => 123,
            'description' => 'Test description',
        );

        $timeEntry = new TimeEntry($data);

        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        'Test'
                    ),
                ),
            )
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $requestManager->expects($this->once())
            ->method('request')
            ->willReturn($response);

        $hydrator = $this->getMockBuilder(TimeEntryHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('extract')
            ->willReturn(array());

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($timeEntry);


        $timeEntryService = new TimeEntryService($requestManager, $hydrator);

        $response = $timeEntryService->updateTimeEntry(123, $timeEntry);

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\TimeEntry\TimeEntry::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testUpdateTimeEntryWithException()
    {
        $data = array(
            'id' => 123,
            'description' => 'Test description',
        );

        $timeEntry = new TimeEntry($data);

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(TimeEntryHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $timeEntryService = new TimeEntryService($requestManager, $hydrator);

        $timeEntryService->updateTimeEntry('test', $timeEntry);
    }

    public function testDeleteTimeEntry()
    {
        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        'Test'
                    ),
                ),
            )
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $requestManager->expects($this->once())
            ->method('request')
            ->willReturn($response);

        $hydrator = $this->getMockBuilder(TimeEntryHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $timeEntryService = new TimeEntryService($requestManager, $hydrator);

        $response = $timeEntryService->deleteTimeEntry(123);

        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testDeleteTimeEntryWithException()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(TimeEntryHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $timeEntryService = new TimeEntryService($requestManager, $hydrator);

        $timeEntryService->deleteTimeEntry('test');
    }

    public function testGetTimeEntriesStartedInDateRange()
    {
        $data = array(
            'id' => 123,
            'description' => 'Test description',
        );

        $timeEntry = new TimeEntry($data);

        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        'Test'
                    ),
                ),
            )
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $requestManager->expects($this->once())
            ->method('request')
            ->willReturn($response);

        $hydrator = $this->getMockBuilder(TimeEntryHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->any())
            ->method('hydrate')
            ->willReturn($timeEntry);


        $timeEntryService = new TimeEntryService($requestManager, $hydrator);

        $response = $timeEntryService->getTimeEntriesStartedInDateRange(new \DateTime('-1 day'), new \DateTime());

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\TimeEntry\TimeEntries::class, $response);
    }

    public function testBulkUpdateTimeEntriesTags()
    {
        $timeEntryIds = array(112, 344, 435, 546);
        $tags = array('tag1', 'tag2', 'tag3');

        $data = array(
            'id' => 123,
            'description' => 'Test description',
        );

        $response = new Response(
            array(
                'statusCode' => 200,
                'body' => array(
                    'data' => array(
                        $data,
                        $data,
                    ),
                ),
            )
        );

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $requestManager->expects($this->once())
            ->method('request')
            ->willReturn($response);

        $hydrator = $this->getMockBuilder(TimeEntryHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->any())
            ->method('hydrate');


        $timeEntryService = new TimeEntryService($requestManager, $hydrator);

        $response = $timeEntryService->bulkUpdateTimeEntriesTags($timeEntryIds, $tags, TagAction::ADD);

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\TimeEntry\TimeEntries::class, $response);
    }
}
