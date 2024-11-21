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
        Schema::table('business_listings', function (Blueprint $table) {
            // Adding missing fields
            $table->string('email')->nullable(); // Add email field
            $table->string('password')->nullable(); // Add password field
            $table->text('description')->nullable(); // Add description field
            $table->string('tags_keywords')->nullable(); // Add tags_keywords field
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('business_listings', function (Blueprint $table) {
            // Dropping the added fields if rollback happens
            $table->dropColumn(['email', 'password', 'description', 'tags_keywords']);
        });
    }
};
