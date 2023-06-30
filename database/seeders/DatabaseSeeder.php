<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(RoleDatabaseSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TitleSeeder::class);
        $this->call(UserSeederSuperAdmin::class);
        // \App\Models\User::factory(10)->create();
    }
}
