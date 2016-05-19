<?php

namespace Marek\Toggable\Tests\Service\Tag;

use Marek\Toggable\API\Http\Response\Response;
use Marek\Toggable\API\Http\Response\ResponseInterface;
use Marek\Toggable\API\Toggl\Values\Tag\Tag;
use Marek\Toggable\Http\Manager\NativeRequestManager;
use Marek\Toggable\Hydrator\Tag\TagHydrator;
use Marek\Toggable\Service\Tag\TagService;

class TagServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateTag()
    {
        $data = array(
            'id' => 123,
            'name' => 'Test name',
        );

        $tag = new Tag($data);

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

        $hydrator = $this->getMockBuilder(TagHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('extract')
            ->willReturn(array());

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($tag);


        $tagService = new TagService($requestManager, $hydrator);

        $response = $tagService->createTag($tag);

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\Tag\Tag::class, $response);
    }

    public function testUpdateTag()
    {
        $data = array(
            'id' => 123,
            'name' => 'Test name',
        );

        $tag = new Tag($data);

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

        $hydrator = $this->getMockBuilder(TagHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $hydrator->expects($this->once())
            ->method('extract')
            ->willReturn(array());

        $hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($tag);


        $tagService = new TagService($requestManager, $hydrator);

        $response = $tagService->updateTag(123, $tag);

        $this->assertInstanceOf(\Marek\Toggable\API\Http\Response\Tag\Tag::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testUpdateTagWithException()
    {
        $data = array(
            'id' => 123,
            'name' => 'Test name',
        );

        $tag = new Tag($data);

        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(TagHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $tagService = new TagService($requestManager, $hydrator);

        $tagService->updateTag('test', $tag);
    }

    public function testDeleteTag()
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

        $hydrator = $this->getMockBuilder(TagHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $tagService = new TagService($requestManager, $hydrator);

        $response = $tagService->deleteTag(123);

        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testDeleteTagWithException()
    {
        $requestManager = $this->getMockBuilder(NativeRequestManager::class)
            ->disableOriginalConstructor()
            ->setMethods(array('request'))
            ->getMock();

        $hydrator = $this->getMockBuilder(TagHydrator::class)
            ->disableOriginalConstructor()
            ->setMethods(array('hydrate', 'extract'))
            ->getMock();

        $tagService = new TagService($requestManager, $hydrator);

        $tagService->deleteTag('test');
    }
}
