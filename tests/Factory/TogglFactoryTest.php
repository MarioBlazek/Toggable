<?php

namespace Marek\Toggable\Tests\Factory;

use Marek\Toggable\Factory\TogglFactory;

class TogglFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testItThrowsExceptionsIfPassedArgumentIsNotAnArray()
    {
        $config = 'config';
        $toggl = TogglFactory::buildToggable($config);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testItThrowsExceptionIfSecurityConfigurationIsNotValid()
    {
        $config = array(
            'marek_toggable' => array(
                'base_uri' => 'https://www.toggl.com/api/v8/',
                'security' => array(
                    'test' => 'test',
                ),
            ),
        );

        $toggl = TogglFactory::buildToggable($config);

        $this->assertInstanceOf('Marek\Toggable\TogglInterface', $toggl);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage('Please provide base URI.')
     */
    public function testItThrowsExceptionIfBaseUriIsNotProvided()
    {
        $config = array(
            'marek_toggable' => array(
                'base_uri' => '',
                'security' => array(
                    'token' => 'some_token',
                ),
            ),
        );

        $toggl = TogglFactory::buildToggable($config);
        $this->assertInstanceOf('Marek\Toggable\TogglInterface', $toggl);
    }

    public function testValidConfigurationWithToken()
    {
        $config = array(
            'marek_toggable' => array(
                'base_uri' => 'https://www.toggl.com/api/v8/',
                'security' => array(
                    'token' => 'some_token',
                ),
            ),
        );

        $toggl = TogglFactory::buildToggable($config);
        $this->assertInstanceOf('Marek\Toggable\TogglInterface', $toggl);
    }

    public function testValidConfigurationWithUsernameAndPassword()
    {
        $config = array(
            'marek_toggable' => array(
                'base_uri' => 'https://www.toggl.com/api/v8/',
                'security' => array(
                    'username' => 'some_username',
                    'password' => 'some_password',
                ),
            ),
        );

        $toggl = TogglFactory::buildToggable($config);
        $this->assertInstanceOf('Marek\Toggable\TogglInterface', $toggl);
    }
}
