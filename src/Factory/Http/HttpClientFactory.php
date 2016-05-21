<?php

namespace Marek\Toggable\Factory\Http;

use Marek\Toggable\API\Security\TokenInterface;
use Marek\Toggable\Factory\FactoryInterface;
use InvalidArgumentException;
use Marek\Toggable\Http\Client\NativeHttpClient;
use Marek\Toggable\Http\Converter\NativeArgumentsConverter;
use Marek\Toggable\Http\Parser\NativeResponseParser;

/**
 * Class HttpClientFactory
 * @package Marek\Toggable\Factory\Http
 */
class HttpClientFactory implements FactoryInterface
{
    /**
     * @var string
     */
    private $uri;

    /**
     * @var \Marek\Toggable\API\Security\TokenInterface
     */
    private $token;

    /**
     * HttpClientFactory constructor.
     *
     * @param array $config
     * @param \Marek\Toggable\API\Security\TokenInterface $token
     */
    public function __construct($config, TokenInterface $token)
    {
        if (empty($config['marek_toggable']['base_uri'])) {
            throw new InvalidArgumentException('Please provide base URI.');
        }
        $this->uri = $config['marek_toggable']['base_uri'];
        $this->token = $token;
    }

    /**
     * @inheritDoc
     */
    public function build()
    {
        if (filter_var($this->uri, FILTER_VALIDATE_URL)) {
            return new NativeHttpClient($this->uri, $this->token, new NativeArgumentsConverter(), new NativeResponseParser());
        }

        throw new InvalidArgumentException('Please provide valid base URI.');
    }
}
