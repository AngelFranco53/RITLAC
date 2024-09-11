<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    protected $model = Tag::class;
    public function definition(): array
    {
        $name = $this->faker->unique()->word(20);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'color' => $this->faker->hexColor,
        ];
    }
}
