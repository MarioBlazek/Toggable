<?php

namespace Marek\Toggable\Tests\API\Security;

use Marek\Toggable\API\Security\TokenInterface;
use Marek\Toggable\API\Security\UsernameAndPasswordToken;

class UsernameAndPasswordTokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TokenInterface
     */
    private $token;

    public function setUp()
    {
        $this->token = new UsernameAndPasswordToken('username', 'password');
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Marek\Toggable\API\Security\TokenInterface', $this->token);
    }

    public function testGetAuthentication()
    {
        $this->assertEquals(array('username', 'password'), $this->token->getAuthentication());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Please provide username in Marek\Toggable\API\Security\UsernameAndPasswordToken
     */
    public function testItThrowsExceptionIfUsernameIsNotValid()
    {
        $token = new UsernameAndPasswordToken('', 'password');
        $token = new UsernameAndPasswordToken(1, 'password');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Please provide password in Marek\Toggable\API\Security\UsernameAndPasswordToken
     */
    public function testItThrowsExceptionIfPasswordIsNotValid()
    {
        $token = new UsernameAndPasswordToken('username', '');
        $token = new UsernameAndPasswordToken('username', 1);
    }
}
