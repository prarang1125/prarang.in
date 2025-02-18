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
        Schema::create('number_of_employees', function (Blueprint $table) {
            $table->id();
            $table->string('range')->unique(); // Range of employees, e.g., "0-5", "6-25"
            $table->unsignedInteger('min_employees')->nullable(); // Minimum employees in range
            $table->unsignedInteger('max_employees')->nullable(); // Maximum employees in range
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('number_of_employees');
    }
};
