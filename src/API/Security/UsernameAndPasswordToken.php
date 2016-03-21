<?php

namespace Marek\Toggable\API\Security;

use InvalidArgumentException;

/**
 * Class UsernameAndPasswordToken
 * @package Marek\Toggable\API\Security
 */
class UsernameAndPasswordToken implements TokenInterface
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * UsernameAndPasswordToken constructor.
     *
     * @param string $username
     * @param string $password
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($username, $password)
    {
        if (empty($username) || !is_string($username)) {
            throw new InvalidArgumentException(
                sprintf('Please provide username in %s', get_class($this))
            );
        }
        $this->username = $username;

        if (empty($password) || !is_string($password)) {
            throw new InvalidArgumentException(
                sprintf('Please provide password in %s', get_class($this))
            );
        }
        $this->password = $password;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthentication()
    {
        return array($this->username, $this->password);
    }
}
