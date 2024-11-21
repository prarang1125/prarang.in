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
        Schema::create('monthly_advertising_mediums', function (Blueprint $table) {
            $table->id();
            $table->string('medium')->unique(); // Medium name, e.g., "Word of Mouth & Phone", "Local Radio"
            $table->string('description')->nullable(); // Optional description
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_advertising_mediums');
    }
};
