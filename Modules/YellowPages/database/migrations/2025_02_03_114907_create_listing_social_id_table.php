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
        Schema::create('listing_social_id', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id');
            $table->unsignedBigInteger('social_id');
            $table->timestamps();
            $table->foreign('listing_id')->references('id')->on('business_listings')->onDelete('cascade');
            $table->foreign('social_id')->references('id')->on('social_media_platforms')->onDelete('cascade');
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('listing_social_id');
    }
};
