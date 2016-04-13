<?php

namespace Marek\Toggable\Http;

/**
 * Interface RequestManagerInterface
 * @package Marek\Toggable\Http
 */
interface RequestManagerInterface
{
    /**
     * Gets Request and returns Response
     *
     * @param \Marek\Toggable\API\Http\Request\Request $request
     *
     * @return \Marek\Toggable\API\Http\Response\Response
     */
    public function request(\Marek\Toggable\API\Http\Request\Request $request);
}
