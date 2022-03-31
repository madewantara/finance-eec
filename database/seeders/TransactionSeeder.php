<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            [
                'uuid' => Str::uuid(),
                'date' => '2022-01-01',
                'token' => 'ABC-123-456',
                'description' => 'Kas',
                'referral_id' => 1,
                'debit' => 10000000,
                'credit' => 10000000,
                'pic' => 'Made Dewantara',
                'project_id' => 1,
                'is_active' => 1,
                'status' => 3,
                'type' => 2,
            ],
            [
                'uuid' => Str::uuid(),
                'date' => '2022-02-01',
                'token' => 'ABC-312-452',
                'description' => 'Transportasi',
                'referral_id' => 2,
                'debit' => 10000000,
                'credit' => 10000000,
                'pic' => 'Hilmi Wicaksono',
                'project_id' => 2,
                'is_active' => 1,
                'status' => 1,
                'type' => 2,
            ],
            [
                'uuid' => Str::uuid(),
                'date' => '2022-03-01',
                'token' => 'ABC-543-534',
                'description' => 'Listrik',
                'referral_id' => 3,
                'debit' => 10000000,
                'credit' => 10000000,
                'pic' => 'Rizky Baihaqy',
                'project_id' => 3,
                'is_active' => 1,
                'status' => 2,
                'type' => 2,
            ],
            [
                'uuid' => Str::uuid(),
                'date' => '2022-04-01',
                'token' => 'ABC-756-446',
                'description' => 'Air',
                'referral_id' => 4,
                'debit' => 10000000,
                'credit' => 10000000,
                'pic' => 'Andra Adhiatma',
                'project_id' => 4,
                'is_active' => 1,
                'status' => 1,
                'type' => 1,
            ],
            [
                'uuid' => Str::uuid(),
                'date' => '2022-05-01',
                'token' => 'ABC-523-445',
                'description' => 'Utang Direksi',
                'referral_id' => 5,
                'debit' => 10000000,
                'credit' => 10000000,
                'pic' => 'Aditya Rahmat',
                'project_id' => 5,
                'is_active' => 1,
                'status' => 2,
                'type' => 2,
            ],
            [
                'uuid' => Str::uuid(),
                'date' => '2022-06-01',
                'token' => 'ABC-763-341',
                'description' => 'Perlengkapan',
                'referral_id' => 6,
                'debit' => 30000000,
                'credit' => 30000000,
                'pic' => null,
                'project_id' => null,
                'is_active' => 1,
                'status' => 1,
                'type' => 1,
            ]
        ]);
    }
}
