<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('balances')->insert([
            [
                'id' => 1,
                'category' => 'cash',
                'balance' => 0,
                'year' => Carbon::now()->year,
            ],
            [
                'id' => 2,
                'category' => 'operational',
                'balance' => 0,
                'year' => Carbon::now()->year,
            ],
            [
                'id' => 3,
                'category' => 'escrow',
                'balance' => 0,
                'year' => Carbon::now()->year,
            ],
        ]);
    }
}
