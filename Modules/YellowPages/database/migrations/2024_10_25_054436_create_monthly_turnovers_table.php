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
        Schema::create('monthly_turnovers', function (Blueprint $table) {
            $table->id();
            $table->string('range')->unique(); // Range in text, e.g., "INR 0-50K"
            $table->unsignedBigInteger('min_turnover')->nullable(); // Minimum turnover in range (e.g., 0 for INR 0-50K)
            $table->unsignedBigInteger('max_turnover')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_turnovers');
    }
};
