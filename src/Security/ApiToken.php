<?php

namespace Marek\Toggl\Security;

use InvalidArgumentException;

/**
 * Class ApiToken
 * @package Marek\Toggl\Security
 */
class ApiToken implements TokenInterface
{
    /**
     * @var string
     */
    private $apiToken;

    /**
     * ApiToken constructor.
     *
     * @param string $apiToken
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($apiToken)
    {
        if (empty($apiToken) || !is_string($apiToken)) {
            throw new InvalidArgumentException(
                sprintf('Please provide API token in %s', get_class($this))
            );
        }
        $this->apiToken = $apiToken;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthenticationString()
    {
        return $this->apiToken . ':api_token';
    }
}
