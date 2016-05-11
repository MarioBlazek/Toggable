<?php

namespace Marek\Toggable\Tests\Factory;

use Marek\Toggable\Factory\TogglFactory;

class TogglFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testItReturnsToggl()
    {
        $config = 'config.php';
        $toggl = TogglFactory::buildToggable($config);

        $this->assertInstanceOf('Marek\Toggable\TogglInterface', $toggl);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testItThrowsExceptionIfNoConfigurationFile()
    {
        $toggl = TogglFactory::buildToggable('no_file.php');
    }
}
