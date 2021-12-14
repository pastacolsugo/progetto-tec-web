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
                'gallery'=>'https://assetscdn1.paytm.com/images/catalog/product/M/MO/MOBOPPO-A52-6-GFUTU6297453D3D253C/1592019058170_0..png'
            ],
            [
                'name'=>'Panasonic Tv',
                'price'=>'499.99',
                'description'=>'A smart tv with much more feature',
                'stock'=>'10',
                'category_id'=>'2',
                'seller_id'=>'3',
                'gallery'=>'https://www.panasonic.com/content/dam/pim/it/it/TX/TX-40D/TX-40DS400E/TX-40DS400E-Variation_Image_for_See_All_1Global-1_it_it.png'
            ],
            [
                'name'=>'Sony Tv',
                'price'=>'850',
                'description'=>'A tv with much more feature',
                'stock'=>'5',
                'category_id'=>'2',
                'seller_id'=>'3',
                'gallery'=>'https://4.imimg.com/data4/PM/KH/MY-34794816/lcd-500x500.png'
            ],
            [
                'name'=>'LG fridge',
                'price'=>'200',
                'description'=>'A fridge with much more feature',
                'stock'=>'250',
                'category_id'=>'3',
                'seller_id'=>'3',
                'gallery'=>'https://www.lg.com/us/images/refrigerators/md05966856/gallery/D-01.jpg'
             ]
        ]);
    }
}
