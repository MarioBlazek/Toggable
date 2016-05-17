<?php

namespace Marek\Toggable\Http\Converter;

/**
 * Interface ArgumentsConverterInterface
 * @package Marek\Toggable\Http\Converter
 */
interface ArgumentsConverterInterface
{
    /**
     * Converts Request object to prepared array for http client
     *
     * @param \Marek\Toggable\API\Http\Request\RequestInterface $request
     * @param \Marek\Toggable\API\Security\TokenInterface $token
     * @param string $uri
     *
     * @return array
     */
    public function convert(
        \Marek\Toggable\API\Http\Request\RequestInterface $request,
        \Marek\Toggable\API\Security\TokenInterface $token,
        $uri
    );
}
