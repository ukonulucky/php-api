<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Buyer;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Seeder\factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::statement("SET FOREIGN_KEY_CHECKS = 0");
        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        Buyer::truncate();
        DB::table("category_product")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS = 1");

        $userQuantity = 200;
        $categoryQauntity = 30;
        $productQuantity = 1000;
        $transactionQuantity = 1000;

        User::factory()->count($userQuantity)->create();
        Category::factory()->count($categoryQauntity)->create();
        Transaction::factory()->count($transactionQuantity)->create();
        Product::factory()->count($productQuantity)->create()->each(function($product){
            $categories = Category::all()->random(Str::random(1,5))->pluck("id");
            $product->categories()->attach($categories);
            });

        // factory(User::class, $userQuantity)->create();
        // factory(Category::class, $categoryQauntity)->create();
        
        // factory(TransactionQuantity::class, $transactionQuantity)->create();
        // factory(Product::class, $productQuantity)->
        
}
}
