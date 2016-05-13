<?php

namespace Marek\Toggable\Http\Client;

/**
 * Class NativeHttpClient
 * @package Marek\Toggable\Http\Client
 */
class NativeHttpClient implements HttpClientInterface
{
    /**
     * @inheritDoc
     */
    public function send($uri, $options)
    {
        $context = stream_context_create($options);

        $stream = @fopen($uri, 'r', false, $context);

        if ($stream == false) {
            return array();
        }

        $data = stream_get_contents($stream);

        $metadata = stream_get_meta_data($stream);
        fclose($stream);

        return array(
            'data'      => $data,
            'metadata'  => $metadata,
        );
    }
}
