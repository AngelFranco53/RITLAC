<?php

namespace Database\Seeders;

use App\Models\Carreer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    public function run(): void
    {
        Carreer::factory(15)->create();
    }
}
