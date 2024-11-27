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
        Schema::create('review', function (Blueprint $table) {
            $table->id();
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');  // Foreign key for user
                $table->foreignId('listing_id')->constrained('business_listings')->onDelete('cascade'); // Foreign key for listing
                $table->decimal('cleanliness', 2, 1)->default(0);  // Rating for cleanliness
                $table->decimal('service', 2, 1)->default(0);  // Rating for service
                $table->decimal('ambience', 2, 1)->default(0);  // Rating for ambience
                $table->decimal('price', 2, 1)->default(0);  // Rating for price
                $table->string('title')->nullable();  // Title for the review
                $table->text('review')->nullable();  // Review content
                $table->string('image')->nullable();  // Path for the uploaded image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review');
    }
};
