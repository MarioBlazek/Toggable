<?php

namespace Marek\Toggable\Http\Parser;

/**
 * Interface HttpResponseParserInterface
 * @package Marek\Toggable\Http\Parser
 */
interface HttpResponseParserInterface
{
    /**
     * Parses http client's raw response
     *
     * @param array $data
     *
     * @return \Marek\Toggable\API\Http\Response\ResponseInterface
     */
    public function parse(array $data);
}
