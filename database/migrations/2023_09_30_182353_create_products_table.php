<?php

use App\Models\Product;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->string("description", 1000);
             $table->integer("quantity")->unsigned();
             $table->string("image");
              $table->string("status")->default(Product::UNAVAILABLE_PRODUCT);
            $table->bigInteger("seller_id")->unsigned();
            $table->foreign("seller_id")->references("id")->on("users")->onDelete("cascade"); // table migration for the foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
