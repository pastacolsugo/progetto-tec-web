<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
                'gallery'=>'/images/oppo-phone.png'
            ],
            [
                'name'=>'Panasonic Tv',
                'price'=>'499.99',
                'description'=>'A smart tv with much more feature',
                'stock'=>'10',
                'category_id'=>'2',
                'seller_id'=>'3',
                'gallery'=>'/images/panasonic-tv.png'
            ],
            [
                'name'=>'Sony Tv',
                'price'=>'850',
                'description'=>'A tv with much more feature',
                'stock'=>'5',
                'category_id'=>'2',
                'seller_id'=>'3',
                'gallery'=>'/images/sony-tv.png'
            ],
            [
                'name'=>'LG fridge',
                'price'=>'200',
                'description'=>'A fridge with many more feature',
                'stock'=>'250',
                'category_id'=>'3',
                'seller_id'=>'3',
                'gallery'=>'/images/lg-fridge.jpg'
             ]
        ]);

        $imgs_folder = 'database/seeders/imgs/';
        $imgs = ['lg-fridge.jpg', 'oppo-phone.png', 'panasonic-tv.png', 'sony-tv.png'];

        foreach ($imgs as $img) {
            File::copy($imgs_folder . $img, Storage::path("images/$img"));
        }
    }
}
