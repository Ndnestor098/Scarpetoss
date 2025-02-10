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
    public function definition(): array
    {
        return [
            "name" => $this->faker->words(3, true),
            "description" => $this->faker->text(),
            "price" => $this->faker->numberBetween(10,300),
            "gender" => $this->faker->randomElement(['mujer', 'hombre', 'niño', 'unisex']),
            "images" => json_encode(['images/1739203457_67aa23819cd55.png', 
                                    'images/1739203457_67aa23819cd55.png',
                                    'images/1739205698_67aa2c42b55e5.png']),
            "stock" => $this->faker->numberBetween(50,150),
            "brand" => $this->faker->company(),
            'visited' => fake()->numberBetween(0, 2000),
            'sell' => fake()->numberBetween(0, 200),
            'trending' => fake()->boolean()
        ];
    }
}
