<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('category_product', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger("category_id")->unsigned();
            $table->bigInteger("product_id")->unsigned();
            
         // seting foreing keys for the many to many relation between products and categories
        $table->foreign("category_id")->references("id")->on("categories");
        $table->foreign("product_id")->references("id")->on("products");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category-product');
    }
};
