<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $connection = 'yp'; // Ensure this is correct for your 'yp' database connection

    public function up(): void
    {
        // Replace the empty string with the actual table name
        Schema::table('categories', function (Blueprint $table) { // Specify the correct table name here
            $table->string('categories_url')->nullable(); // Add 'categories_url' field
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) { // Same table name for down method
            $table->dropColumn('categories_url');
        });
    }
};
