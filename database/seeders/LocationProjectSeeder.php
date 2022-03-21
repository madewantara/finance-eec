<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LocationProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('location_projects')->insert([
            [
                'uuid' => Str::uuid(),
                'address' => 'Sorong, Sorong City, West Papua, Indonesia',
                'latitude' => '-0.8761629000000001',
                'longitude' => '131.255828',
            ],
            [
                'uuid' => Str::uuid(),
                'address' => 'Majene Regency, West Sulawesi, Indonesia',
                'latitude' => '-3.0297251',
                'longitude' => '118.9062794',
            ],
            [
                'uuid' => Str::uuid(),
                'address' => 'Tarakan, Tarakan City, East Kalimantan, Indonesia',
                'latitude' => '3.3273599',
                'longitude' => '117.5785049',
            ],
            [
                'uuid' => Str::uuid(),
                'address' => 'Semarang, Semarang City, Central Java, Indonesia',
                'latitude' => '-7.0051453',
                'longitude' => '110.4381254',
            ],
            [
                'uuid' => Str::uuid(),
                'address' => 'Medan, Medan City, North Sumatra, Indonesia',
                'latitude' => '3.5951956',
                'longitude' => '98.67222270000001',
            ],
            [
                'uuid' => Str::uuid(),
                'address' => 'Medan, Medan City, North Sumatra, Indonesia',
                'latitude' => '3.5951956',
                'longitude' => '98.67222270000001',
            ],
            [
                'uuid' => Str::uuid(),
                'address' => 'Medan, Medan City, North Sumatra, Indonesia',
                'latitude' => '3.5951956',
                'longitude' => '98.67222270000001',
            ],
            [
                'uuid' => Str::uuid(),
                'address' => 'Medan, Medan City, North Sumatra, Indonesia',
                'latitude' => '3.5951956',
                'longitude' => '98.67222270000001',
            ],
            [
                'uuid' => Str::uuid(),
                'address' => 'Medan, Medan City, North Sumatra, Indonesia',
                'latitude' => '3.5951956',
                'longitude' => '98.67222270000001',
            ],
            [
                'uuid' => Str::uuid(),
                'address' => 'Medan, Medan City, North Sumatra, Indonesia',
                'latitude' => '3.5951956',
                'longitude' => '98.67222270000001',
            ],
        ]);
    }
}
