<?php

namespace Marek\Toggable\API\Http\Request\ProjectUsers;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class DeleteProjectUser
 * @package Marek\Toggable\API\Http\Request\ProjectUser
 *
 * @property-read int $projectUserId
 */
class DeleteProjectUser extends Request
{
    /**
     * @var string
     */
    public $uri = 'project_users/{project_user_id}';

    /**
     * @var int
     */
    public $projectUserId;

    /**
     * @var string
     */
    public $method = Request::DELETE;

    /**
     * DeleteProjectUser constructor.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        parent::__construct($parameters);
        $this->uri = str_replace('{project_user_id}', $this->projectUserId, $this->uri);
    }
}
