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
        Schema::create('business_listings', function (Blueprint $table) {
            $table->id();
            $table->string('listing_title');
            $table->string('tagline')->nullable();
            $table->string('business_name');
            $table->string('business_address')->nullable();
            $table->string('primary_phone')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('primary_contact_name')->nullable();
            $table->string('primary_contact_email')->nullable();
            $table->string('secondary_contact_name')->nullable();
            $table->string('secondary_contact_email')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('legal_type_id')->nullable();
            $table->unsignedBigInteger('employee_range_id')->nullable();
            $table->unsignedBigInteger('turnover_id')->nullable();
            $table->unsignedBigInteger('advertising_medium_id')->nullable();
            $table->unsignedBigInteger('advertising_price_id')->nullable();
            $table->string('pincode')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->text('full_address')->nullable();
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->text('social_media_description')->nullable();
            $table->unsignedBigInteger('social_id')->nullable();
            $table->string('logo')->nullable();
            $table->string('feature_img')->nullable();
            $table->string('business_img')->nullable();
            $table->string('notification_email')->nullable();
            $table->string('user_name')->nullable();
            $table->boolean('agree')->default(false);
            $table->boolean('is_active')->default(true);
            $table->text('faq')->nullable();
            $table->text('answer')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('legal_type_id')->references('id')->on('company_legal_types')->onDelete('set null');
            $table->foreign('employee_range_id')->references('id')->on('employee_ranges')->onDelete('set null');
            $table->foreign('turnover_id')->references('id')->on('monthly_turnovers')->onDelete('set null');
            $table->foreign('advertising_medium_id')->references('id')->on('advertising_mediums')->onDelete('set null');
            $table->foreign('advertising_price_id')->references('id')->on('monthly_advertising_prices')->onDelete('set null');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('set null'); // assuming you have a states table
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null'); // assuming you have a cities table
            $table->foreign('social_id')->references('id')->on('social_media')->onDelete('set null'); // assuming you have a social media table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_listings');
    }
};
