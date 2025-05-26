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
        Schema::create('all_products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('sku')->nullable();
            $table->integer('sales_quantity')->default(0);
            $table->integer('sales_remaining_products')->default(0);
            $table->decimal('sales_price', 10, 2)->default(0);
            $table->string('image_src')->nullable();
            $table->string('image_alt')->nullable();
            $table->json('product_gallery')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_products');
    }
};
