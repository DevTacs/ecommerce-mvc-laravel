<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'stock' => fake()->numberBetween(10,15),
            'price' => fake()->numberBetween(100, 1000),
            'image_url' => 'https://picsum.photos/400/400'
        ];
    }
}