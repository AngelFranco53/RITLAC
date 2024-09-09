<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'AngelFranko',
            'name' => 'Angel David',
            'first_last_name' => 'Franco',
            'second_last_name' => 'Villaseñor',

            'personal_email' => 'angelfranko117@gmail.com',
            'email' => 'angel@angel.com',
            'password' => 12345678,

            'carreer_id' => 1,
        ]);

        User::factory(99)->create();
    }
}
