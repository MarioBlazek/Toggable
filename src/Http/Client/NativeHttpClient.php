<?php

namespace Marek\Toggable\Http\Client;

use Marek\Toggable\API\Exception\Http\NetworkException;
use Marek\Toggable\API\Security\TokenInterface;
use Marek\Toggable\Http\Converter\ArgumentsConverterInterface;
use Marek\Toggable\Http\Parser\HttpResponseParserInterface;
use InvalidArgumentException;

/**
 * Class NativeHttpClient
 * @package Marek\Toggable\Http\Client
 */
class NativeHttpClient implements HttpClientInterface
{
    /**
     * @var \Marek\Toggable\Http\Converter\ArgumentsConverterInterface
     */
    private $converter;

    /**
     * @var \Marek\Toggable\Http\Parser\HttpResponseParserInterface
     */
    private $parser;

    /**
     * @var
     */
    private $uri;

    /**
     * @var \Marek\Toggable\API\Security\TokenInterface
     */
    private $token;

    /**
     * @var array
     */
    private $data;

    /**
     * NativeHttpClient constructor.
     *
     * @param string $uri
     * @param \Marek\Toggable\API\Security\TokenInterface $token
     * @param \Marek\Toggable\Http\Converter\ArgumentsConverterInterface $converter
     * @param \Marek\Toggable\Http\Parser\HttpResponseParserInterface $parser
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($uri, TokenInterface $token, ArgumentsConverterInterface $converter, HttpResponseParserInterface $parser)
    {
        $this->converter = $converter;
        $this->parser = $parser;

        if (empty($uri) || !is_string($uri) || filter_var($uri, FILTER_VALIDATE_URL) === false) {
            throw new InvalidArgumentException(
                sprintf('Please provide valid ur in %s', get_class($this))
            );
        }
        $this->uri = $uri;
        $this->token = $token;
    }

    /**
     * @inheritDoc
     */
    public function send()
    {
        $context = stream_context_create($this->data['options']);

        $stream = @fopen($this->data['uri'], 'r', false, $context);

        if ($stream === false) {
            return array();
        }

        $data = stream_get_contents($stream);

        if (empty($data)) {
            throw new NetworkException('Toggl server is unreachable');
        }

        $metadata = stream_get_meta_data($stream);

        fclose($stream);

        return array('data' => $data, 'metadata' => $metadata['wrapper_data']);
    }

    /**
     * @inheritDoc
     */
    public function prepare(\Marek\Toggable\API\Http\Request\RequestInterface $request)
    {
        $this->data = $this->converter->convert($request, $this->token, $this->uri);
    }

    /**
     * @inheritDoc
     */
    public function getResponse()
    {
        $data = $this->send();

        return $this->parser->parse($data);
    }
}
