<?php

namespace Marek\Toggable\Tests\Hydrator\Workspace;

use Marek\Toggable\API\Toggl\Values\Dashboard\Activity;
use Marek\Toggable\API\Toggl\Values\Tag\Tag;
use Marek\Toggable\API\Toggl\Values\Workspace\Subscription;
use Marek\Toggable\Hydrator\Workspace\SubscriptionHydrator;

class SubscriptionHydratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SubscriptionHydrator
     */
    private $hydrator;

    public function setUp()
    {
        $this->hydrator = new SubscriptionHydrator();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Marek\Toggable\Hydrator\HydratorInterface', $this->hydrator);
    }

    public function testCanHydrate()
    {
        $this->assertFalse($this->hydrator->canHydrate(new Activity()));
        $this->assertFalse($this->hydrator->canHydrate(new Tag()));
        $this->assertTrue($this->hydrator->canHydrate(new Subscription()));
    }

    public function testItProperlyHydratesData()
    {
        $deletedAt = new \DateTime();
        $createdAt = new \DateTime();
        $updateAt = new \DateTime();
        $vatValidatedAt = new \DateTime();
        $vatInvalidAcceptedAt = new \DateTime();

        $data = array(
            'workspace_id'              => 324,
            'deleted_at'                => $deletedAt->format('c'),
            'created_at'                => $createdAt->format('c'),
            'updated_at'                => $updateAt->format('c'),
            'vat_valid'                 => true,
            'vat_validated_at'          => $vatValidatedAt->format('c'),
            'vat_invalid_accepted_by'   => "Accepted by",
            'vat_invalid_accepted_at'   => $vatInvalidAcceptedAt->format('c'),
            'description'               => "Test description",
            'vat_applicable'            => false,
        );

        /** @var Subscription $subscription */
        $subscription = $this->hydrator->hydrate($data, new Subscription());

        $this->assertEquals($data['workspace_id'], $subscription->workspace_id);
        $this->assertEquals($data['deleted_at'], $subscription->deleted_at->format('c'));
        $this->assertEquals($data['created_at'], $subscription->created_at->format('c'));
        $this->assertEquals($data['updated_at'], $subscription->updated_at->format('c'));
        $this->assertEquals($data['vat_valid'], $subscription->vat_valid);
        $this->assertEquals($data['vat_validated_at'], $subscription->vat_validated_at->format('c'));
        $this->assertEquals($data['vat_invalid_accepted_by'], $subscription->vat_invalid_accepted_by);
        $this->assertEquals($data['vat_invalid_accepted_at'], $subscription->vat_invalid_accepted_at->format('c'));
        $this->assertEquals($data['description'], $subscription->description);
        $this->assertEquals($data['vat_applicable'], $subscription->vat_applicable);
    }

    public function testItProperlyExtractsObjects()
    {
        $deletedAt = new \DateTime();
        $createdAt = new \DateTime();
        $updateAt = new \DateTime();
        $vatValidatedAt = new \DateTime();
        $vatInvalidAcceptedAt = new \DateTime();

        $subscription = new Subscription(
            array(
                'workspace_id'              => 324,
                'deleted_at'                => $deletedAt,
                'created_at'                => $createdAt,
                'updated_at'                => $updateAt,
                'vat_valid'                 => true,
                'vat_validated_at'          => $vatValidatedAt,
                'vat_invalid_accepted_by'   => "Accepted by",
                'vat_invalid_accepted_at'   => $vatInvalidAcceptedAt,
                'description'               => "Test description",
                'vat_applicable'            => false,
            )
        );

        $data = $this->hydrator->extract($subscription);

        $this->assertEquals($subscription->workspace_id, $data['workspace_id']);
        $this->assertEquals($subscription->deleted_at->format('c'), $data['deleted_at']);
        $this->assertEquals($subscription->created_at->format('c'), $data['created_at']);
        $this->assertEquals($subscription->updated_at->format('c'), $data['updated_at']);
        $this->assertEquals($subscription->vat_valid, $data['vat_valid']);
        $this->assertEquals($subscription->vat_validated_at->format('c'), $data['vat_validated_at']);
        $this->assertEquals($subscription->vat_invalid_accepted_by, $data['vat_invalid_accepted_by']);
        $this->assertEquals($subscription->vat_invalid_accepted_at->format('c'), $data['vat_invalid_accepted_at']);
        $this->assertEquals($subscription->description, $data['description']);
        $this->assertEquals($subscription->vat_applicable, $data['vat_applicable']);
    }
}
