<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            [
                'email' => 'made@finance.com',
                'password' => Hash::make('password'),
            ],
            [
                'email' => 'made1@finance1.com',
                'password' => Hash::make('password1'),
            ],
            [
                'email' => 'made2@finance2.com',
                'password' => Hash::make('password2'),
            ],
        ]);
    }
}
