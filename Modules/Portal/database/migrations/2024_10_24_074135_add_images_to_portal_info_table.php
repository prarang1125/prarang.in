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
        Schema::connection('main')->table('portals', function (Blueprint $table) {
            $table->string('header_image')->nullable();
            $table->string('footer_image')->nullable();
            $table->string('local_info_image')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('portals', function (Blueprint $table) {
            
        });
    }
};
