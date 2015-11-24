<?php

namespace Marek\Toggl\Configuration;

class TokenAuth implements AuthConfigurationInterface
{
    /**
     * @var string
     */
    private $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthentication()
    {
        return [$this->token, "api_token"];
    }
}
