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
        Schema::create('user_purchase_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained('business_listings')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamp('purchased_at'); // Date and time of purchase
            $table->timestamp('expires_at')->nullable(); // Expiration date of the plan
            $table->decimal('amount', 10, 2); // Amount paid for the plan
            $table->string('payment_status')->default('pending'); // Payment status: pending, completed, etc.
            $table->string('transaction_id')->nullable(); // Optional transaction ID
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_purchase_plans');
    }
};
