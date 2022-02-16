<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cart;
use App\Models\Address;
use App\Models\Category;
use App\Models\Product;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            CartSeeder::class,
            CartItemSeeder::class,
        ]);
        // User::factory(10)->has(Cart::factory())->has(Address::factory()->count(2))->create();
        // Category::factory()->has(Product::factory(10))->create();
    }
}
