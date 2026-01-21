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
        Schema::connection('yp')->create('business_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_listing_id');
            $table->string('product_name');
            $table->text('description')->nullable();
            $table->string('price')->nullable();
            $table->string('purchase_url')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('business_listing_id')->references('id')->on('business_listings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('yp')->dropIfExists('business_products');
    }
};
