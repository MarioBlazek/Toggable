<?php

namespace Marek\Toggable\Tests\API\Http\Request\Tag;

use Marek\Toggable\API\Http\Request\Tag\UpdateTag;

class UpdateTagTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UpdateTag
     */
    private $request;

    public function setUp()
    {
        $this->request = new UpdateTag(
            array(
                'tagId' => 456,
                'data'  => array('data'),
            )
        );
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\Marek\Toggable\API\Http\Request\RequestInterface', $this->request);
    }

    public function testGetValidUri()
    {
        $this->assertEquals('tags/456', $this->request->getUri());
    }

    public function testGetData()
    {
        $this->assertEquals(array('data'), $this->request->getData());
    }

    public function testJsonSerialize()
    {
        $this->assertEquals(array('tag' => array('data')), $this->request->jsonSerialize());
    }

    public function testItReturnsPutForMethod()
    {
        $this->assertEquals('PUT', $this->request->getMethod());
    }
}
