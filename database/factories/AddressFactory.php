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
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'company' => $this->faker->company,
            'address1' => $this->faker->streetName,
            'address2' => $this->faker->streetAddress,
            'state_or_province' => $this->faker->city,
            'city' => $this->faker->city,
            'postal_code' => $this->faker->postcode,
            'country_code' => Country::inRandomOrder()->first()->iso_2,
        ];
    }
}
