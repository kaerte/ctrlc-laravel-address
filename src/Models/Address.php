<?php

declare(strict_types=1);

namespace Ctrlc\Address\Models;

use Ctrlc\Address\Database\Factories\AddressFactory;
use Ctrlc\Address\Traits\HasGeocoding;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    use HasFactory;
    use HasGeocoding;

    protected $hidden = [
        'addressable_type',
        'addressable_id',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'addressable_id',
        'addressable_type',

        'first_name',
        'last_name',
        'company',
        'address1',
        'address2',
        'city',
        'state_or_province',
        'postal_code',
        'country_code',
        'phone',

        'is_primary',
        'is_billing',
        'is_shipping',
    ];

    protected $casts = [
        'addressable_id' => 'integer',
        'addressable_type' => 'string',

        'first_name' => 'string',
        'last_name' => 'string',
        'company' => 'string',
        'address1' => 'string',
        'address2' => 'string',
        'city' => 'string',
        'state_or_province' => 'string',
        'postal_code' => 'string',
        'country_code' => 'string',
        'phone' => 'string',

        'is_primary' => 'boolean',
        'is_billing' => 'boolean',
        'is_shipping' => 'boolean',
    ];

    public function addressable(): MorphTo
    {
        return $this->morphTo('addressable');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_code', 'iso_2');
    }

    public function makePrimary(): Address
    {
        $this->is_primary = 1;

        return $this;
    }

    public function makeBilling(): Address
    {
        $this->is_billing = 1;

        return $this;
    }

    public function makeShipping(): Address
    {
        $this->is_shipping = 1;

        return $this;
    }

    // scopes

    public function scopeIsPrimary(Builder $builder): Builder
    {
        return $builder->where('is_primary', 1);
    }

    public function scopeIsBilling(Builder $builder): Builder
    {
        return $builder->where('is_billing', 1);
    }

    public function scopeIsShipping(Builder $builder): Builder
    {
        return $builder->where('is_shipping', 1);
    }

    public function scopeInCountry(Builder $builder, string $countryCode): Builder
    {
        return $builder->where('country_code', $countryCode);
    }

    public function getHtmlAddressAttribute(): string
    {
        return $this->getAddressAsString('<br>');
    }

    public function getInlineAddressAttribute(): string
    {
        return $this->getAddressAsString(', ');
    }

    public function getTextareaAddressAttribute(): string
    {
        return $this->getAddressAsString("\n");
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    private function getAddressAsString($separator = ', ')
    {
        $str = '';
        $str .= $this->line_1 . $separator;
        $str .= $this->line_2 . $separator;
        if ($this->line_3) {
            $str .= $this->line_3 . $separator;
        }
        $str .= $this->postcode . $separator;
        $str .= $this->country->name;

        return $str;
    }

    public function __toString()
    {
        return $this->getAddressAsString();
    }

    protected static function newFactory(): AddressFactory
    {
        return AddressFactory::new();
    }
}
