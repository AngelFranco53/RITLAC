<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ImageSeeder::class,
            KeyWordsSeeder::class,
            CareerSeeder::class,
            UserSeeder::class,
            PostSeeder::class,
        ]);

    }
}
