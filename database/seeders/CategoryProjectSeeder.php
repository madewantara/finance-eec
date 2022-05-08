<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_projects')->insert([
            [
                'id' => 5,
                'category' => 'New Radar',
                'uuid' => Str::uuid(),
            ],
            [
                'id' => 4,
                'category' => 'Preventive Maintenance',
                'uuid' => Str::uuid(),
            ],
            [
                'id' => 6,
                'category' => 'Corrective Maintenance',
                'uuid' => Str::uuid(),
            ],
            [
                'id' => 3,
                'category' => 'Radar Reinstallation',
                'uuid' => Str::uuid(),
            ],
            [
                'id' => 2,
                'category' => 'Radar Spare Part',
                'uuid' => Str::uuid(),
            ],
            [
                'id' => 1,
                'category' => 'Radar Upgrade',
                'uuid' => Str::uuid(),
            ],
        ]);
    }
}
