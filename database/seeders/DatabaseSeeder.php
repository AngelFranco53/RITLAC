<?php

namespace Database\Seeders;

use App\Models\Carreer;
use App\Models\Category;
use App\Models\KeyWords;
use App\Models\Tag;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Storage::makeDirectory('posts');

        Carreer::factory(10)->create();
        KeyWords::factory(10)->create();
        
        $this->call([
            UserSeeder::class,
        ]);

        Category::factory(10)->create();
        Tag::factory(10)->create();

        $this->call([
            PostSeeder::class,
        ]);
    }
}
