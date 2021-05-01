<?php

declare(strict_types=1);

namespace Ctrlc\Address\Tests\Feature;

use Ctrlc\Address\Models\Address;
use Ctrlc\Address\Tests\TestCase;
use Ctrlc\Address\Tests\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddressTest extends TestCase
{
    use RefreshDatabase;

    public User $addressable;

    protected function setUp(): void
    {
        parent::setUp();

        $addressable = User::factory()->create();
        $this->addressable = $addressable;
    }

    public function test_create_plain_address(): void
    {
        $address = Address::factory()->create(['is_primary' => 1]);
        $this->addressable->addresses()->save($address);
        self::assertCount(1, $this->addressable->addresses);
    }

    public function test_create_primary_address(): void
    {
        $manyAddresses = Address::factory(20)->create();
        $this->addressable->addresses()->saveMany($manyAddresses);

        $address = Address::factory()->create();

        $this->addressable->setPrimaryAddress($address);

        self::assertTrue($address->fresh()->is($this->addressable->fresh()->primaryAddress()->first()));
        self::assertCount(1, $this->addressable->fresh()->primaryAddress()->get());
    }

    public function test_create_billing_address(): void
    {
        $manyAddresses = Address::factory(20)->create();
        $this->addressable->addresses()->saveMany($manyAddresses);

        $address = Address::factory()->create();

        $this->addressable->setBillingAddress($address);

        self::assertTrue($address->fresh()->is($this->addressable->fresh()->billingAddress()->first()));
        self::assertCount(1, $this->addressable->fresh()->billingAddress()->get());
    }

    public function test_create_shipping_address(): void
    {
        $manyAddresses = Address::factory(20)->create();
        $this->addressable->addresses()->saveMany($manyAddresses);

        $address = Address::factory()->create();

        $this->addressable->setShippingAddress($address);

        self::assertTrue($address->fresh()->is($this->addressable->fresh()->shippingAddress()->first()));
        self::assertCount(1, $this->addressable->fresh()->shippingAddress()->get());
    }
}
