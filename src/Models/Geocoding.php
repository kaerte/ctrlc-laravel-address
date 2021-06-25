<?php

declare(strict_types=1);

namespace Ctrlc\Address\Models;

use Illuminate\Database\Eloquent\Model;

class Geocoding extends Model
{
    protected $fillable = [
        'latitude',
        'longitude',
        'geocoding_metadata',
        'geocoding_provider',
    ];

    protected $casts = [
        'geocoding_metadata' => 'json',
        'geocoding_provider' => 'string',
    ];
}
