<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        static $password;
        return [
            'name' => fake()->name(),
            'description' => fake()->paragraph(1),
            'quantity' => fake()->numberBetween(1,10), 
            'status'=>fake()->randomElement([
                Product::AVAILABLE_PRODUCT,Product::UNAVAILABLE_PRODUCT
            ]),
            'image'=>fake()->randomElement([
                "pic1.png", "pic2.png", "pic3.png"
            ]),
            "seller_id" => User::all()->random()->id
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
