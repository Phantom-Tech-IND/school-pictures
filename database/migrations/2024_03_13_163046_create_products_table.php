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
            $table->enum('product_type', ['personal', 'school']);
            $table->unsignedInteger('price');
            $table->string('images')->nullable();
            $table->text('description')->nullable();
            $table->text('additional_information')->nullable();
            $table->timestamps();
            $table->json('custom_attributes')->nullable();
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
