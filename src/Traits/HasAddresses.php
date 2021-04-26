<?php declare(strict_types=1);

namespace Ctrlc\Address\Traits;

use Ctrlc\Address\Models\Address;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasAddresses
{
    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function primaryAddress(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable')->isPrimary();
    }

    public function billingAddress(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable')->isBilling();
    }

    public function shippingAddress(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable')->isShipping();
    }

    public function setPrimaryAddress(Address $address): bool
    {
        $currentAddresses = $this->addresses()->isPrimary();
        if ($currentAddresses) {
            $currentAddresses->update(['is_primary' => 0]);
        }
        $address->makePrimary();
        $address->save();
        $this->addresses()->save($address);

        return true;
    }

    public function setBillingAddress(Address $address): bool
    {
        $currentAddresses = $this->addresses()->isBilling();
        if ($currentAddresses) {
            $currentAddresses->update(['is_billing' => 0]);
        }
        $address->makeBilling();
        $address->save();
        $this->addresses()->save($address);

        return true;
    }

    public function setShippingAddress(Address $address): bool
    {
        $currentAddresses = $this->addresses()->isShipping();
        if ($currentAddresses) {
            $currentAddresses->update(['is_shipping' => 0]);
        }
        $address->makeShipping();
        $address->save();
        $this->addresses()->save($address);

        return true;
    }
}
