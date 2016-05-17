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

        sscanf($data['metadata'][0], 'HTTP/%*d.%*d %d', $statusCode);

        return new Response(
            array(
                'statusCode' => $statusCode,
                'body' => $body,
            )
        );
    }
}
