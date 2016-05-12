<?php

namespace Marek\Toggable\Tests\API\Security;

use Marek\Toggable\API\Security\ApiToken;
use Marek\Toggable\API\Security\TokenInterface;

class ApiTokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TokenInterface
     */
    private $token;

    public function setUp()
    {
        $this->token = new ApiToken('api_token');
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Marek\Toggable\API\Security\TokenInterface', $this->token);
    }

    public function testGetAuthentication()
    {
        $this->assertEquals(array('api_token', 'api_token'), $this->token->getAuthentication());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Please provide API token in Marek\Toggable\API\Security\ApiToken
     */
    public function testItThrowsExceptionIfApiTokenIsNotValid()
    {
        $token = new ApiToken('');
        $token = new ApiToken(1);
    }
}
