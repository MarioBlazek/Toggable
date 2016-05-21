<?php

namespace Marek\Toggable\Tests\Factory\Authentication;

use Marek\Toggable\API\Security\ApiToken;
use Marek\Toggable\API\Security\TokenInterface;
use Marek\Toggable\API\Security\UsernameAndPasswordToken;
use Marek\Toggable\Factory\Authentication\AuthenticationFactory;

class AuthenticationFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testItReturnsApiToken()
    {
        $config = array(
            'marek_toggable' => array(
                'base_uri' => 'https://www.toggl.com/api/v8/',
                'security' => array(
                    'token' => 'tok3n',
                ),
            ),
        );

        $factory = new AuthenticationFactory($config);

        $this->assertInstanceOf(TokenInterface::class, $factory->build());
        $this->assertInstanceOf(ApiToken::class, $factory->build());
    }

    public function testItReturnsUsernameAndPasswordToken()
    {
        $config = array(
            'marek_toggable' => array(
                'base_uri' => 'https://www.toggl.com/api/v8/',
                'security' => array(
                    'username' => 'username',
                    'password' => 'pa$$w0rd',
                ),
            ),
        );

        $factory = new AuthenticationFactory($config);

        $this->assertInstanceOf(TokenInterface::class, $factory->build());
        $this->assertInstanceOf(UsernameAndPasswordToken::class, $factory->build());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidConfigurationShouldThrowException()
    {
        $config = array(
            'marek_toggable' => array(
                'base_uri' => 'https://www.toggl.com/api/v8/',
                'security' => array(
                    'token' => ''
                ),
            ),
        );

        $factory = new AuthenticationFactory($config);
        $factory->build();
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidConfigurationOnInstantiation()
    {
        $factory = new AuthenticationFactory(array());
    }
}
