<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            [
                'referral' => '1100000-10',
                'name' => 'Kas',
                'category' => 'Aktiva Lancar',
                'uuid' => Str::uuid(),
                'is_active' => '1',
            ],
            [
                'referral' => '1800000-10',
                'name' => 'Tanah',
                'category' => 'Aktiva Tidak Lancar',
                'uuid' => Str::uuid(),
                'is_active' => '1',
            ],
            [
                'referral' => '2100000-10',
                'name' => 'Hutang Usaha',
                'category' => 'Kewajiban Jangka Pendek',
                'uuid' => Str::uuid(),
                'is_active' => '1',
            ],
            [
                'referral' => '3100000-10',
                'name' => 'Modal Saham',
                'category' => 'Modal',
                'uuid' => Str::uuid(),
                'is_active' => '1',
            ],
            [
                'referral' => '3200000-10',
                'name' => 'Laba Rugi Tahun-tahun Sebelumnya',
                'category' => 'Laba Rugi',
                'uuid' => Str::uuid(),
                'is_active' => '1',
            ],
            [
                'referral' => '4100000-10',
                'name' => 'Penjualan',
                'category' => 'Pendapatan',
                'uuid' => Str::uuid(),
                'is_active' => '1',
            ],
            [
                'referral' => '5100000-10',
                'name' => 'Harga Pokok Project Pemeliharaan RC EEC',
                'category' => 'Harga Pokok Project',
                'uuid' => Str::uuid(),
                'is_active' => '1',
            ],
            [
                'referral' => '5200000-10',
                'name' => 'Biaya Gaji',
                'category' => 'Biaya Operasional',
                'uuid' => Str::uuid(),
                'is_active' => '1',
            ],
            [
                'referral' => '5300000-10',
                'name' => 'Biaya Penyusutan Gedung',
                'category' => 'Biaya Non Operasional',
                'uuid' => Str::uuid(),
                'is_active' => '1',
            ],
            [
                'referral' => '6100000-10',
                'name' => 'Pendapatan Komisi',
                'category' => 'Pendapatan/Beban Lain-Lain',
                'uuid' => Str::uuid(),
                'is_active' => '1',
            ],
            [
                'referral' => '6200000-10',
                'name' => 'Rugi Penjualan Aktiva',
                'category' => 'Beban Lain-Lain',
                'uuid' => Str::uuid(),
                'is_active' => '1',
            ],
            [
                'referral' => '6300000-10',
                'name' => 'Pajak Kini',
                'category' => 'Pendapatan/Beban Pajak',
                'uuid' => Str::uuid(),
                'is_active' => '1',
            ],
        ]);
    }
}
