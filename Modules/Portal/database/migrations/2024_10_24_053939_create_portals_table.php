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
        Schema::connection('main')->create('portals', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // slug
            $table->integer('city_id')->unique(); // city_id
            $table->string('city_code')->unique(); // city_code
            $table->string('city_slogan')->default('Greate City'); // city_slogan
            $table->text('map_link')->nullable(); // map_link
            $table->text('weather_widget_code')->nullable(); // weather_widget_code
            $table->text('sports_widget_code')->nullable(); // sports_widget_code
            $table->text('news_widget_code')->nullable(); // news_widget_code
            $table->text('local_matrics')->nullable(); // local_matrics
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portals');
    }
};
