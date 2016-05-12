<?php

namespace Marek\Toggable\Tests\API\Security\Cookie;

use Marek\Toggable\API\Security\Cookie\SessionCookie;
use Marek\Toggable\API\Security\Cookie\SessionCookieInterface;

class SessionCookieTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SessionCookieInterface
     */
    private $cookie;

    public function setUp()
    {
        $this->cookie = new SessionCookie('cookie');
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Marek\Toggable\API\Security\Cookie\SessionCookieInterface', $this->cookie);
    }

    public function testItReturnsSessionCookie()
    {
        $this->assertEquals(array('toggl_api_session_new' => 'cookie'), $this->cookie->getSessionCookie());
    }

    public function testToString()
    {
        $this->assertEquals('cookie', $this->cookie->toString());
    }

    /**
     * @expectedException \Marek\Toggable\API\Exception\InvalidArgumentException
     * @expectedExceptionMessage $cookie argument not provided in Marek\Toggable\API\Security\Cookie\SessionCookie
     */
    public function testItThrowsException()
    {
        $cookie = new SessionCookie(null);
        $cookie = new SessionCookie('');
    }
}
