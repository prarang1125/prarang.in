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
        Schema::create('vcard', function (Blueprint $table) {
            $table->id();
            $table->string('color_code')->nullable(); // Color Code
            $table->string('slug')->unique(); // Unique Slug
            $table->string('banner_img')->nullable(); // Path to Banner Image
            $table->string('logo')->nullable(); // Path to Logo
            $table->string('title'); // Card Title
            $table->string('subtitle')->nullable(); // Card Subtitle
            $table->text('description')->nullable(); // Card Description
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vcard');
    }
};
