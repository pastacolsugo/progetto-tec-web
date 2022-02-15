<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carts = DB::table('carts')->get();
        $products = DB::table('products')->whereIn('id', [1, 2])->get();
        for ($i = 0, $size = count($carts); $i < $size; $i++) {

            DB::table('cart_items')->insert([
                [
                    'product_id' => '1',
                    'cart_id' => $carts[$i]->id,
                    'quantity' => '2',
                ],
                [
                    'product_id' => '2',
                    'cart_id' => $carts[$i]->id,
                    'quantity' => '1',
                ]
            ]);
            DB::table('carts')
                ->where('id',$i + 1)
                ->update([
                    'items' => 2,
                    'subtotal' => $products[0]->price + $products[1]->price,
            ]);
        }
    }
}
