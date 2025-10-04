<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $connection = 'yp';
    public function up(): void
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->string('city_arr')->nullable(); 
            $table->string('city_slug')->nullable(); 
            
        });
    }
    public function down(): void
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->dropColumn(['city_arr', 'city_slug']);
        });
    }
};
