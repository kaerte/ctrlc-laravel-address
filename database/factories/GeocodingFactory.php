<?php

declare(strict_types=1);

namespace Ctrlc\Address\Database\Factories;

use Ctrlc\Address\Models\Geocoding;
use Illuminate\Database\Eloquent\Factories\Factory;

class GeocodingFactory extends Factory
{
    protected $model = Geocoding::class;

    public function definition()
    {
        return [
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'geocoding_metadata' => json_encode($this->faker->rgbColorAsArray),
            'geocoding_provider' => $this->faker->streetName,
        ];
    }
}
