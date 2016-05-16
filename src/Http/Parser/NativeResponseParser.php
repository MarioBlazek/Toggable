<?php

namespace Marek\Toggable\Http\Parser;

use Marek\Toggable\API\Http\Response\Response;

/**
 * Class NativeResponseParser
 * @package Marek\Toggable\Http\Parser
 */
class NativeResponseParser implements HttpResponseParserInterface
{
    /**
     * @inheritDoc
     */
    public function parse(array $data)
    {
        $body = json_decode($data['data'], true);

        $statusCode = empty($data['metadata']['wrapper_data'][0]) ? 0 : $data['metadata']['wrapper_data'][0];

        return new Response(
            array(
                'statusCode' => $statusCode,
                'body' => $body,
            )
        );
    }
}
