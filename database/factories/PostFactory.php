<?php

namespace Database\Factories;

use App\Models\Carreer;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;
    public function definition(): array
    {
        $name = $this->faker->sentence(4);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'abstract' => $this->faker->text(200),
            'sumary' => $this->faker->text(200),
            'extract' => $this->faker->text(200),
            'body' => $this->faker->text(2000),
            'status' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'file' => $this->faker->word(20),
            'reviwer_id' => User::all()->random()->id,
            'publisher_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'carreer_id' => Carreer::all()->random()->id,
        ];
    }
}
