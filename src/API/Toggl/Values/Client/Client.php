<?php

namespace Marek\Toggable\API\Toggl\Values\Client;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class Client
 * @package Marek\Toggable\API\Toggl\Values\Client
 *
 * @property-read int $id
 * @property-read int $guid
 * @property-read int $wid
 * @property-read string $name
 * @property-read \DateTime $at
 * @property-read string $notes
 * @property-read float $hrate
 * @property-read string $cur
 */
class Client extends ValueObject
{
    const ACTIVE = 'true';
    const NON_ACTIVE = 'false';
    const BOTH = 'both';
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $guid;

    /**
     * @var int
     */
    public $wid;

    /**
     * @var string
     */
    public $name;

    /**
     * @var \DateTime
     */
    public $at;

    /**
     * @var string
     */
    public $notes;

    /**
     * @var float
     */
    public $hrate;

    /**
     * @var string
     */
    public $cur;

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        $data =  array();

        if (!empty($this->id)) {
            $data['id'] = $this->id;
        }

        if (!empty($this->guid)) {
            $data['guid'] = $this->guid;
        }

        if (!empty($this->wid)) {
            $data['wid'] = $this->wid;
        }

        if (!empty($this->name)) {
            $data['name'] = $this->name;
        }

        if (!empty($this->notes)) {
            $data['notes'] = $this->notes;
        }

        if (!empty($this->cur)) {
            $data['cur'] = $this->cur;
        }

        if (!empty($this->hrate)) {
            $data['hrate'] = $this->hrate;
        }

        if (!empty($this->at)) {
            $data['at'] = $this->at->format('c');
        }

        return $data;
    }
}
