<?php

declare(strict_types=1);

namespace Ctrlc\Address\Traits;

use Ctrlc\Address\Models\Geocoding;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasGeocoding
{
    public function geocoding(): MorphOne
    {
        return $this->morphOne(Geocoding::class, 'geocodingable');
    }
}
