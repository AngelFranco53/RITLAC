<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\KeyWords;
use Illuminate\Support\Str;

class KeyWordsFactory extends Factory
{
    protected $model = KeyWords::class;
    public function definition(): array
    {
        $name = $this->faker->unique()->sentence(2);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
