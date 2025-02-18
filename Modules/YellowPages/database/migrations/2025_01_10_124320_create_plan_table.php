<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plan', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2)->default(0.00);
            $table->enum('type', ['yellowpages', 'vcard']);
            $table->timestamps();
        });

         // Insert predefined plans into the plans table
         DB::table('plan')->insert([
            ['name' => 'Free', 'description' => 'Basic access to Yellow Pages.', 'price' => 0.00, 'type' => 'yellowpages'],
            ['name' => 'Popular', 'description' => 'Increased visibility and features in Yellow Pages.', 'price' => 29.99, 'type' => 'yellowpages'],
            ['name' => 'Premium', 'description' => 'Exclusive premium access, includes Vcard Premium.', 'price' => 49.99, 'type' => 'yellowpages'],
            ['name' => 'Free', 'description' => 'Basic access to Vcard.', 'price' => 0.00, 'type' => 'vcard'],
            ['name' => 'Premium', 'description' => 'Advanced Vcard features for enhanced presentation.', 'price' => 19.99, 'type' => 'vcard'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan');
    }
};
