<?php

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
        $this->call(AdminUserProfile::class);
        $this->call(CategorySectionSeeder::class);
        $this->call(BrandSeeder::class);

    }
}
