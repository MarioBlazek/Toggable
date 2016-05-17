<?php

namespace Marek\Toggable\Http\Converter;

use Marek\Toggable\API\Security\TokenInterface;
use Marek\Toggable\API\Http\Request\RequestInterface;

/**
 * Class NativeArgumentsConverter
 * @package Marek\Toggable\Http\Converter
 */
class NativeArgumentsConverter implements ArgumentsConverterInterface
{
    /**
     * @inheritDoc
     */
    public function convert(RequestInterface $request, TokenInterface $token, $uri)
    {
        $opts = array(
            'http' => array(
                'method' => $request->getMethod(),
                'header' => array(
                    'Content-type: application/json',
                ),
            ),
        );

        $auth = $token->getAuthentication();
        $auth = $auth[0] . ':' . $auth[1];
        $auth = base64_encode($auth);
        $opts['http']['header'][] = 'Authorization: Basic ' . $auth;

        if (!empty($request->getData())) {
            $opts['http']['content'] = json_encode($request);
        }

        $uri = $uri . '/' . $request->getUri();

        return array(
            'uri' => $uri,
            'options' => $opts,
        );
    }
}
