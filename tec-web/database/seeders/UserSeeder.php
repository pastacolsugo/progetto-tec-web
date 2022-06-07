<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'Peter Parker',
                'email'=>'peter@parker.com',
                'password'=>Hash::make('12345'),
                'isSeller'=>TRUE
            ],
            [
                'name'=>'Bruce Banner',
                'email'=>'bruce@banner.com',
                'password'=>Hash::make('12345'),
                'isSeller'=>FALSE
            ],
            [
                'name'=>'Tony Stark',
                'email'=>'tony@stark.com',
                'password'=>Hash::make('12345'),
                'isSeller'=>TRUE
            ],
            [
                'name'=>'Steve Rogers',
                'email'=>'steve@rogers.com',
                'password'=>Hash::make('12345'),
                'isSeller'=>FALSE
            ],
            [
                'name'=>'Natasha Romanoff',
                'email'=>'natasha@romanoff.com',
                'password'=>Hash::make('12345'),
                'isSeller'=>TRUE
            ],
            [
                'name'=>'Filippo Benvenuti',
                'email'=>'filippo@example.com',
                'password'=>Hash::make('12345'),
                'isSeller'=>FALSE
            ],
            [
                'name'=>'Ugo Baroncini',
                'email'=>'ugo.baroncini@studio.unibo.it',
                'password'=>Hash::make('12345'),
                'isSeller'=>FALSE
            ],
            [
                'name'=>'Alice Girolomini',
                'email'=>'alice.girolomini@studio.unibo.it',
                'password'=>Hash::make('12345'),
                'isSeller'=>FALSE
            ]
        ]);
    }
}
