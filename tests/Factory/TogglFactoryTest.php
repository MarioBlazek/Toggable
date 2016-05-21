<?php

namespace Marek\Toggable\Tests\Factory;

use Marek\Toggable\Factory\FactoryInterface;
use Marek\Toggable\Factory\TogglFactory;
use Marek\Toggable\TogglInterface;

class TogglFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testItThrowsExceptionsIfPassedArgumentIsNotAnArray()
    {
        $config = "test";
        $factory = new TogglFactory($config);
    }

    public function testItReturnsToggl()
    {
        $config = array(
            'marek_toggable' => array(
                'base_uri' => 'https://www.toggl.com/api/v8/',
                'security' => array(
                    'token' => 'tok3n',
                ),
            ),
        );

        $factory = new TogglFactory($config);

        $this->assertInstanceOf(FactoryInterface::class, $factory);
        $this->assertInstanceOf(TogglInterface::class, $factory->build());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testItThrowsExceptionOfConfigIsInvalid()
    {
        $config = array();
        $factory = new TogglFactory($config);
    }
}
