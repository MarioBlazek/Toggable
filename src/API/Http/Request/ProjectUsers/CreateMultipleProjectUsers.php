<?php

namespace Marek\Toggable\API\Http\Request\ProjectUsers;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class CreateMultipleProjectUsers
 * @package Marek\Toggable\API\Http\Request\ProjectUser
 *
 * @property-read array $userIds
 * @property-read int $projectId
 */
class CreateMultipleProjectUsers extends Request
{
    /**
     * @var string
     */
    protected $uri = 'project_users';

    /**
     * @var int
     */
    protected $projectId;

    /**
     * @var array
     */
    protected $userIds;

    /**
     * @var string
     */
    protected $method = Request::POST;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        $data = $this->data;
        $data['uid'] = implode(",", $this->userIds);
        $data['pid'] = $this->projectId;

        return array('project_user' => $data);
    }
}
