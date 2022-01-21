<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIDs = DB::table('users')->pluck('id');
        for ($i = 0, $size = count($userIDs); $i < $size; $i++) {
            $uid = $userIDs[$i];

            DB::table('carts')->insert([
                'items' => 0,
                'subtotal' => 0.0,
                'user_id' => $uid,
            ]);
        }
    }
}
