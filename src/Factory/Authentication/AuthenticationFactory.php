<?php

namespace Marek\Toggable\Factory\Authentication;

use Marek\Toggable\API\Security\ApiToken;
use Marek\Toggable\API\Security\UsernameAndPasswordToken;
use Marek\Toggable\Factory\FactoryInterface;
use InvalidArgumentException;

/**
 * Class AuthenticationFactory
 * @package Marek\Toggable\Factory\Authentication
 */
class AuthenticationFactory implements FactoryInterface
{
    /**
     * @var array
     */
    private $config;

    /**
     * AuthenticationFactory constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        if (empty($config['marek_toggable']['security'])) {
            throw new InvalidArgumentException('Please provide security configuration.');
        }
        $this->config = $config;
    }

    /**
     * @inheritdoc
     */
    public function build()
    {
        if (!empty($this->config['marek_toggable']['security']['token'])) {

            return new ApiToken($this->config['marek_toggable']['security']['token']);

        } else if (!empty($this->config['marek_toggable']['security']['username']) && !empty($this->config['marek_toggable']['security']['password'])) {

            return new UsernameAndPasswordToken(
                $this->config['marek_toggable']['security']['username'],
                $this->config['marek_toggable']['security']['password']
            );

        } else {

            throw new InvalidArgumentException('Please provide valid security configuration.');

        }
    }
}
