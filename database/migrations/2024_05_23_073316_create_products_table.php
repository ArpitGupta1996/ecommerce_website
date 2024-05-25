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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('price');
            $table->string('product_code');
            $table->text('description');
            $table->string('image');
            $table->string('width');
            $table->string('height');
            $table->string('depth');
            $table->string('weight');
            $table->string('quality_checking');
            $table->string('quantity');
            $table->string('color');
            $table->string('discount');
            $table->timestamps();
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
