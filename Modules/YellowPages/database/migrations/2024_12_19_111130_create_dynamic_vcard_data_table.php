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
        Schema::create('dynamic_vcard_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vcard_id'); // Foreign Key to Cards Table
            $table->string('title'); // Dynamic Field Title
            $table->text('data'); // Dynamic Field Data
            $table->timestamps(); // Created and Updated At
    
            // Foreign Key Constraint
            $table->foreign('vcard_id')->references('id')->on('vcard')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dynamic_vcard_data');
    }
};
