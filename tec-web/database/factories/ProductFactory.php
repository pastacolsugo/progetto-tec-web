<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 0, 10000),
            'description' => $this->faker->paragraph(),
            'stock' => $this->faker->randomNumber($nbDigits = 8),
            'category_name' => Category::factory(),
            'seller_id' => User::factory(),
        ];
    }
}
