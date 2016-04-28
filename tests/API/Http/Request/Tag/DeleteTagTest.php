<?php

namespace Marek\Toggable\Tests\API\Http\Request\Tag;

use Marek\Toggable\API\Http\Request\Tag\DeleteTag;

class DeleteTagTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DeleteTag
     */
    private $request;

    public function setUp()
    {
        $this->request = new DeleteTag(
            array(
                'tagId' => 456,
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
