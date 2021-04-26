<?php declare(strict_types=1);

namespace Ctrlc\Address\Models;

use Ctrlc\Address\Database\Factories\AddressFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    use HasFactory;

    protected $with = ['country'];

    protected $fillable = [
        'addressable_id',
        'addressable_type',
        'country_id',
        'label',
        'first_name',
        'surname',
        'line1',
        'line2',
        'line3',
        'postcode',
        'city',
        'latitude',
        'longitude',
        'is_primary',
        'is_billing',
        'is_shipping',

        'geocoding_metadata',
        'geocoding_provider',
    ];

    protected $casts = [
        'addressable_id' => 'integer',
        'addressable_type' => 'string',
        'label' => 'string',

        'first_name' => 'string',
        'surname' => 'string',
        'line1' => 'string',
        'line2' => 'string',
        'line3' => 'string',
        'postcode' => 'string',
        'city' => 'string',

        'latitude' => 'float',
        'longitude' => 'float',
        'is_primary' => 'boolean',
        'is_billing' => 'boolean',
        'is_shipping' => 'boolean',
        'deleted_at' => 'datetime',

        'geocoding_metadata' => 'json',
    ];

    protected $rules = [
        'addressable_id' => 'required|integer',
        'addressable_type' => 'required|string|max:150',

        'label' => 'nullable|string|max:150',

        'company' => 'nullable|string|max:150',
        'first_name' => 'nullable|string|max:150',
        'surname' => 'nullable|string|max:150',
        'line1' => 'nullable|string|max:150',
        'line2' => 'nullable|string|max:150',
        'line3' => 'nullable|string|max:150',
        'postcode' => 'nullable|string|max:150',
        'city' => 'nullable|string|max:150',

        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'is_primary' => 'sometimes|boolean',
        'is_billing' => 'sometimes|boolean',
        'is_shipping' => 'sometimes|boolean',

    ];

    protected $hidden = [
        'addressable_type',
        'addressable_id',
        'created_at',
        'updated_at',
    ];

    public function addressable(): MorphTo
    {
        return $this->morphTo('addressable');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
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

    //

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
        return $this->first_name . ' ' . $this->surname;
    }

    private function getAddressAsString($separator = ', ')
    {
        $str = '';
        $str .= $this->line1 . $separator;
        $str .= $this->line2 . $separator;
        if ($this->line3) {
            $str .= $this->line3 . $separator;
        }
        $str .= $this->postcode . $separator;
        $str .= $this->country->name;

        return $str;
    }

    protected static function newFactory(): AddressFactory
    {
        return AddressFactory::new();
    }
}
