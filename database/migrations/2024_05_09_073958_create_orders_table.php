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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 10, 2);
            $table->decimal('shipping_cost', 10, 2)->default(0);
            $table->enum('status', ['pending', 'completed']);
            $table->string('invoice')->nullable();
            $table->json('billing_address')->nullable();
            $table->json('shipping_address')->nullable();
            $table->enum('payment_method', ['card', 'bank_transfer']);
            $table->enum('payment_status', ['paid', 'unpaid']);
            $table->boolean('address_same_as_billing')->default(0);
            $table->text('comment')->nullable();
            $table->foreignId('contact_id')->constrained('contacts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
