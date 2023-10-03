<?php

namespace Database\Factories;

use App\Models\Seller;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transactions>
 */
class TransactionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $seller = Seller::has("pruducts")->get()->random();
        $buyer = User::all()->except($seller->id)->random();
      
        return [
            'quantity' => fake()->numberBetween(0,3),
            'buyer_id' => $buyer->id, 
            "product_id" => $seller
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
 
}
