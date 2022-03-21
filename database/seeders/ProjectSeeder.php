<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            [
                'uuid' => Str::uuid(),
                'name' => 'PM - Sorong',
                'location_id' => 1,
                'category_id' => 4,
                'status' => 1,
                'contract' => 10000000,
                'start_date' => '2022-01-01',
                'end_date' => '2022-01-31',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'CM - Majene',
                'location_id' => 2,
                'category_id' => 3,
                'status' => 1,
                'contract' => 30000000,
                'start_date' => '2021-02-01',
                'end_date' => '2021-02-31',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Reinstallation - Tarakan',
                'location_id' => 3,
                'category_id' => 5,
                'status' => 1,
                'contract' => 25000000,
                'start_date' => '2021-12-01',
                'end_date' => '2021-12-31',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'New Radar - Semarang',
                'location_id' => 4,
                'category_id' => 2,
                'status' => 1,
                'contract' => 70000000,
                'start_date' => '2022-04-01',
                'end_date' => '2022-04-31',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Bongkar Radar - Medan',
                'location_id' => 5,
                'category_id' => 1,
                'status' => 1,
                'contract' => 25000000,
                'start_date' => '2022-05-01',
                'end_date' => '2022-05-31',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Jakarta',
                'location_id' => 6,
                'category_id' => 1,
                'status' => 1,
                'contract' => 25000000,
                'start_date' => '2022-05-01',
                'end_date' => '2022-05-31',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Bali',
                'location_id' => 7,
                'category_id' => 1,
                'status' => 1,
                'contract' => 15000000,
                'start_date' => '2022-05-01',
                'end_date' => '2022-05-31',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Surabaya',
                'location_id' => 8,
                'category_id' => 1,
                'status' => 1,
                'contract' => 15000000,
                'start_date' => '2022-05-01',
                'end_date' => '2022-05-31',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'DIY',
                'location_id' => 9,
                'category_id' => 1,
                'status' => 1,
                'contract' => 15000000,
                'start_date' => '2022-05-01',
                'end_date' => '2022-05-31',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Sulawesi',
                'location_id' => 10,
                'category_id' => 1,
                'status' => 1,
                'contract' => 15000000,
                'start_date' => '2022-05-01',
                'end_date' => '2022-05-31',
            ],
        ]);
    }
}
