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
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_code')->unique()->nullable()->after('email');
        });
    }
   
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_code');
        });
    }
};
