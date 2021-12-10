<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->word(),
            'city' => $this->faker->city(),
            'province' => $this->faker->word(),
            'ZIP_code'=> $this->faker->randomNumber($nbDigits = 5),
        ];
    }
}
