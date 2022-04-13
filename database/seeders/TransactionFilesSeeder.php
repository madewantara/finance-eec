<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionFilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_files')->insert([
            [
                'transaction_id' => 1,
                'category' => 'cash',
                'type' => 1,
                'name' => 'test.pdf',
            ],
            [
                'transaction_id' => 1,
                'category' => 'cash',
                'type' => 2,
                'name' => 'test2.pdf',
            ],
            [
                'transaction_id' => 1,
                'category' => 'cash',
                'type' => 2,
                'name' => 'test3.pdf',
            ],
            [
                'transaction_id' => 2,
                'category' => 'cash',
                'type' => 1,
                'name' => 'file.pdf',
            ],
            [
                'transaction_id' => 2,
                'category' => 'cash',
                'type' => 2,
                'name' => 'file2.pdf',
            ],
            [
                'transaction_id' => 3,
                'category' => 'cash',
                'type' => 1,
                'name' => 'doc.pdf',
            ],
            [
                'transaction_id' => 3,
                'category' => 'cash',
                'type' => 2,
                'name' => 'doc2.pdf',
            ],
            [
                'transaction_id' => 4,
                'category' => 'cash',
                'type' => 1,
                'name' => 'pdf.pdf',
            ],
            [
                'transaction_id' => 4,
                'category' => 'cash',
                'type' => 2,
                'name' => 'pdf2.pdf',
            ],
            [
                'transaction_id' => 5,
                'category' => 'cash',
                'type' => 1,
                'name' => 'img.jpg',
            ],
            [
                'transaction_id' => 5,
                'category' => 'cash',
                'type' => 2,
                'name' => 'img2.jpg',
            ],
        ]);
    }
}
