<?php

namespace Marek\Toggable\Tests\API\Http\Request\Workspace;

use Marek\Toggable\API\Http\Request\Workspace\UpdateWorkspace;

class UpdateWorkspaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UpdateWorkspace
     */
    private $request;

    public function setUp()
    {
        $this->request = new UpdateWorkspace(
            array(
                'workspaceId' => 123,
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
        $this->assertEquals('workspaces/123', $this->request->getUri());
    }

    public function testGetData()
    {
        $this->assertEquals(array('data'), $this->request->getData());
    }

    public function testJsonSerialize()
    {
        $this->assertEquals(array('workspace' => array('data')), $this->request->jsonSerialize());
    }

    public function testItReturnsPutForMethod()
    {
        $this->assertEquals('PUT', $this->request->getMethod());
    }
}
