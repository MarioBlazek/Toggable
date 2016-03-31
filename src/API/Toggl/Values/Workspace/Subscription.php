<?php

namespace Marek\Toggable\API\Toggl\Values\Workspace;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class Subscription
 * @package Marek\Toggable\API\Toggl\Values\Workspace
 *
 * @property-read int $workspace_id
 * @property-read \DateTime $deleted_at
 * @property-read \DateTime $created_at
 * @property-read \DateTime $updated_at
 * @property-read boolean $vat_valid
 * @property-read \DateTime $vat_validated_at
 * @property-read \DateTime $vat_invalid_accepted_at
 * @property-read string $vat_invalid_accepted_by
 * @property-read string $description
 * @property-read boolean $vat_applicable
 */
class Subscription extends ValueObject
{
    /**
     * @var int
     */
    public $workspace_id;

    /**
     * @var \DateTime
     */
    public $deleted_at;

    /**
     * @var \DateTime
     */
    public $created_at;

    /**
     * @var \DateTime
     */
    public $updated_at;

    /**
     * @var boolean
     */
    public $vat_valid;

    /**
     * @var \DateTime
     */
    public $vat_validated_at;

    /**
     * @var \DateTime
     */
    public $vat_invalid_accepted_at;

    /**
     * @var string
     */
    public $vat_invalid_accepted_by;

    /**
     * @var string
     */
    public $description;

    /**
     * @var boolean
     */
    public $vat_applicable;
}
