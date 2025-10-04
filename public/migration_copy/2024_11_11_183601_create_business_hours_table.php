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
        Schema::create('business_hours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained('business_listings')->onDelete('cascade');
            $table->string('day'); // e.g., "Monday"
            $table->time('open_time')->nullable();
            $table->time('close_time')->nullable();
            $table->time('open_time_2')->nullable(); // For the second time slot
            $table->time('close_time_2')->nullable(); // For the second time slot
            $table->boolean('is_24_hours')->default(false);
            $table->boolean('add_2nd_time_slot')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_hours');
    }
};
