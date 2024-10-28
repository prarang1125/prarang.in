<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'yp';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('monthly_advertising_prices', function (Blueprint $table) {
            $table->id();
            $table->string('range')->unique(); // Range in text, e.g., "INR 0-10K"
            $table->unsignedBigInteger('min_price')->nullable(); // Minimum price in range (e.g., 0 for INR 0-10K)
            $table->unsignedBigInteger('max_price')->nullable(); // Maximum price in range (e.g., 10000 for INR 0-10K)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_advertising_prices');
    }
};
