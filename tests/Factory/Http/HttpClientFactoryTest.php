<?php

namespace Marek\Toggable\Tests\Factory\Http;

use Marek\Toggable\API\Security\ApiToken;
use Marek\Toggable\Factory\Http\HttpClientFactory;
use Marek\Toggable\Http\Client\HttpClientInterface;

class HttpClientFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testItReturnsNativeHttpClient()
    {
        $apiToken = new ApiToken('tok3n');

        $config = array(
            'marek_toggable' => array(
                'base_uri' => 'https://www.toggl.com/api/v8/',
                'security' => array(
                    'token' => 'tok3n',
                ),
            ),
        );

        $factory = new HttpClientFactory($config, $apiToken);
        $this->assertInstanceOf(HttpClientInterface::class, $factory->build());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testItThrowsExceptionOnInstantiationIfConfigIsInvalid()
    {
        $apiToken = new ApiToken('tok3n');

        $config = array(
            'marek_toggable' => array(),
        );

        $factory = new HttpClientFactory($config, $apiToken);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testItThrowsExceptionIfUriIsInvalid()
    {
        $apiToken = new ApiToken('tok3n');

        $config = array(
            'marek_toggable' => array(
                'base_uri' => '123',
                'security' => array(
                    'token' => 'tok3n',
                ),
            ),
        );

        $factory = new HttpClientFactory($config, $apiToken);
        $factory->build();
    }
}
