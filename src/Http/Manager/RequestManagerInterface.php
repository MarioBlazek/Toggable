<?php

namespace Marek\Toggable\Http\Manager;

/**
 * Interface RequestManagerInterface
 * @package Marek\Toggable\Http\Manager
 */
interface RequestManagerInterface
{
    /**
     * Gets Request and returns Response
     *
     * @param \Marek\Toggable\API\Http\Request\RequestInterface $request
     *
     * @return \Marek\Toggable\API\Http\Response\Response
     *
     * @throws \Marek\Toggable\API\Exception\NotFoundException
     */
    public function request(\Marek\Toggable\API\Http\Request\RequestInterface $request);
}
