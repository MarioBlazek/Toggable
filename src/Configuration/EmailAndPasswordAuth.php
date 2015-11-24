<?php

namespace Marek\Toggl\Configuration;

class EmailAndPasswordAuth implements AuthConfigurationInterface
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /*
     * {@inheritDoc}
     */
    public function getAuthentication()
    {
        return [$this->email, $this->password];
    }
}
