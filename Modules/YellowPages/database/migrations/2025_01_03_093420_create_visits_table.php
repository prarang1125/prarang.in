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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained('business_listings')->onDelete('cascade');
            $table->string('user_type'); // 'guest' or 'user'
            $table->string('username')->nullable(); // User's name or null for guests
            $table->ipAddress('ip_address'); // IP address of the visitor
            $table->string('url'); // Page URL
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
