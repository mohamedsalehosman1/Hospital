<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {DB::table("admins")->delete();
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' =>'Admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
};
