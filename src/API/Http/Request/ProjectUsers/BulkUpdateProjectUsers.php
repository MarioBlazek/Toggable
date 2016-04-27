<?php

namespace Marek\Toggable\API\Http\Request\ProjectUsers;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class BulkUpdateProjectUsers
 * @package Marek\Toggable\API\Http\Request\ProjectUser
 */
class BulkUpdateProjectUsers extends BulkDeleteProjectUsers
{
    /**
     * @var string
     */
    public $method = Request::PUT;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('project_user' => $this->data);
    }
}
