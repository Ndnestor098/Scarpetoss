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
            "images" => json_encode(['https://cdn.pixabay.com/photo/2013/07/12/18/20/shoes-153310_1280.png', 
                                    'https://pixabay.com/photos/feet-footwear-legs-shoes-sneakers-1842328/',
                                    'https://cdn.pixabay.com/photo/2015/07/05/23/28/shoes-832875_640.jpg']),
            "stock" => $this->faker->numberBetween(50,150),
            "brand" => $this->faker->company(),
            'visited' => fake()->numberBetween(0, 2000),
            'sell' => fake()->numberBetween(0, 200),
            'trending' => fake()->boolean()
        ];
    }
}
