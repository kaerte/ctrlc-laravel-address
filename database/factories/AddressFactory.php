<?php

declare(strict_types=1);

namespace Ctrlc\Address\Database\Factories;

use Ctrlc\Address\Models\Address;
use Ctrlc\Address\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition()
    {
        return [
            'label'      => $this->faker->colorName.' address',
            'first_name' => $this->faker->firstName,
            'surname'    => $this->faker->lastName,
            'line_1'      => $this->faker->countryISOAlpha3,
            'line_2'      => $this->faker->address,
            'line_3'      => $this->faker->city,
            'postcode'   => $this->faker->postcode,
            'city'       => $this->faker->city,
            'country_id' => Country::inRandomOrder()->first()->id,

            'latitude'  => $this->faker->latitude,
            'longitude' => $this->faker->longitude,

            'is_primary'  => $this->faker->boolean,
            'is_billing'  => $this->faker->boolean,
            'is_shipping' => $this->faker->boolean,
        ];
    }
}
