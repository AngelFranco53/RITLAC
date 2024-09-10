<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Carreer;
use Illuminate\Support\Str;

class CarreerFactory extends Factory
{
    protected $model = Carreer::class;
    public function definition(): array
    {
        $name = $this->faker->unique()->sentence(4);
        return [
            'name' => $name,
            'description' => $this->faker->sentence(10),
            'abbreviates' => Str::upper(Str::substr($name, 0, 3)),
            'slug' => Str::slug($name),
        ];
    }
}
