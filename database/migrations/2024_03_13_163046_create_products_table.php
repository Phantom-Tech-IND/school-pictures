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
            $table->decimal('price', 8, 2);
            $table->string('tags')->nullable();
            $table->string('images')->nullable();
            $table->boolean('is_digital')->default(false);
            $table->decimal('digital_price')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->json('custom_attributes')->nullable();
        });

        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('image_path');
            $table->timestamps();
        });

        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('type');  // 'radio', 'selector', 'input', 'fileInput'
            $table->string('name');  // To identify the attribute
            $table->text('options')->nullable();  // JSON encoded values for radios and selectors
            $table->timestamps();
        });

        Schema::create('product_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_attribute_id')->constrained()->onDelete('cascade');
            $table->string('value');  // Value could be text, selected option, or file path
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
