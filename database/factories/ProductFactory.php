<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>fake()->company(),
            'category_id'=>fake()->randomDigit(),
            'price'=>fake()->randomNumber(),
            'qty'=>fake()->randomDigit(),
            'description'=>fake()->sentence(),
        ];
    }
}
