<?php

namespace Database\Seeders;

use App\Models\KeyWords;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeyWordsSeeder extends Seeder
{
    public function run(): void
    {
        KeyWords::factory(15)->create();
    }
}
