<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'=>'Oppo mobile',
                'price'=>'350',
                'description'=>'A smartphone with 8gb ram and much more feature',
                'stock'=>'100',
                'category_id'=>'1',
                'seller_id'=>'3',
                'gallery'=>'/img/products/oppo-phone.png'
            ],
            [
                'name'=>'Panasonic Tv',
                'price'=>'499.99',
                'description'=>'A smart tv with much more feature',
                'stock'=>'10',
                'category_id'=>'2',
                'seller_id'=>'3',
                'gallery'=>'/img/products/panasonic-tv.png'
            ],
            [
                'name'=>'Sony Tv',
                'price'=>'850',
                'description'=>'A tv with much more feature',
                'stock'=>'5',
                'category_id'=>'2',
                'seller_id'=>'3',
                'gallery'=>'/img/products/sony-tv.png'
            ],
            [
                'name'=>'LG fridge',
                'price'=>'200',
                'description'=>'A fridge with much more feature',
                'stock'=>'250',
                'category_id'=>'3',
                'seller_id'=>'3',
                'gallery'=>'/img/products/lg-fridge.jpg'
             ]
        ]);
    }
}
