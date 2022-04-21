<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            MapUserRoleSeeder::class,
            RoleSeeder::class,
            ProjectSeeder::class,
            CategoryProjectSeeder::class,
            LocationProjectSeeder::class,
            TransactionSeeder::class,
            TransactionFilesSeeder::class,
            BalanceSeeder::class,
        ]);
    }
}
