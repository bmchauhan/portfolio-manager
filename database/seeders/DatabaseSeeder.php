<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\SkillSeeder;
use Database\Seeders\LanguageSeeder;
use Database\Seeders\DataImportSeeder;

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
            // AdminUserSeeder::class,
            // SkillSeeder::class, // Commented out to use DataImportSeeder instead
            // LanguageSeeder::class, // Commented out to use DataImportSeeder instead
            DataImportSeeder::class,
        ]);
    }
}
