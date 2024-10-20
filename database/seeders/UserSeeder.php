<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        DB::table("users")->delete();//delete first
        //add second

        DB::table('users')->insert([
            'name' => 'user',
            'email' =>'user@yahoo.com',
            'password' => Hash::make('12345678'),
        ]);
    }
};
