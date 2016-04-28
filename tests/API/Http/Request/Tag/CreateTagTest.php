<?php

namespace Marek\Toggable\Tests\API\Http\Request\Tag;

use Marek\Toggable\API\Http\Request\Tag\CreateTag;

class CreateTagTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CreateTag
     */
    private $request;

    public function setUp()
    {
        $this->request = new CreateTag(
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
        $this->assertEquals('tags', $this->request->getUri());
    }

    public function testGetData()
    {
        $this->assertEquals(array('data'), $this->request->getData());
    }

    public function testJsonSerialize()
    {
        $this->assertEquals(array('tag' => array('data')), $this->request->jsonSerialize());
    }

    public function testItReturnsPostForMethod()
    {
        $this->assertEquals('POST', $this->request->getMethod());
    }
}
