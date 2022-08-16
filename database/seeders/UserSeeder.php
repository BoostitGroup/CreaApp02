<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
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
            'name' => "rania",
            'email' => "harmel.rania1@boost-it.co",
            'role' => 1,
            'password' => Hash::make('harmelrania'),
        ]);
    }
}
