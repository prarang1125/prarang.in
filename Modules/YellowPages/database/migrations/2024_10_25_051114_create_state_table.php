<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // protected $connection = 'yp';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('yp')->create('cities', function (Blueprint $table) {
           
                $table->id(); // Auto-incrementing primary key
                $table->string('name'); // City name
                $table->string('timezone'); // Timezone of the city
                $table->timestamps(); // Created and updated timestamps
            
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
    
};
