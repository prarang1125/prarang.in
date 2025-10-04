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
        Schema::create('company_legal_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Name of the legal type (e.g., Pvt Ltd, Partnership)
            $table->string('description')->nullable(); // Optional description field
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_legal_types');
    }
};
