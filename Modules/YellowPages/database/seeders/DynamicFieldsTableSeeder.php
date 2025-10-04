<?php

namespace Modules\YellowPages\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DynamicFieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fields = [
            ['name' => 'फ़ोन', 'type' => 'number', 'icon' => 'bx bx-phone', 'is_active' => 1],
            ['name' => 'ईमेल', 'type' => 'text', 'icon' => 'bx bx-envelope', 'is_active' => 1],
            ['name' => 'पता', 'type' => 'text', 'icon' => 'bx bx-map', 'is_active' => 1],
            ['name' => 'वेबसाइट', 'type' => 'URL', 'icon' => 'bx bx-globe', 'is_active' => 1],
            ['name' => 'टेक्स्ट', 'type' => 'text', 'icon' => 'bx bx-message-square-dots', 'is_active' => 1],
            ['name' => 'फेसबुक', 'type' => 'URL', 'icon' => 'bx bxl-facebook', 'is_active' => 1],
            ['name' => 'ट्विटर', 'type' => 'URL', 'icon' => 'bx bxl-twitter', 'is_active' => 1],
            ['name' => 'इंस्टाग्राम', 'type' => 'URL', 'icon' => 'bx bxl-instagram', 'is_active' => 1],
            ['name' => 'व्हाट्सएप्प', 'type' => 'number', 'icon' => 'bx bxl-whatsapp', 'is_active' => 1],
            ['name' => 'टेलीग्राम', 'type' => 'URL', 'icon' => 'bx bxl-telegram', 'is_active' => 1],
            ['name' => 'स्काइप', 'type' => 'text', 'icon' => 'bx bxl-skype', 'is_active' => 1],
            ['name' => 'वीचैट', 'type' => 'text', 'icon' => 'fab fa-weixin', 'is_active' => 1],
            ['name' => 'संकेत', 'type' => 'text', 'icon' => 'fab fa-signal', 'is_active' => 1],
            ['name' => 'स्नैपचैट', 'type' => 'URL', 'icon' => 'bx bxl-snapchat', 'is_active' => 1],
            ['name' => 'लिंक्डइन', 'type' => 'URL', 'icon' => 'bx bxl-linkedin', 'is_active' => 1],
            ['name' => 'पिंटरेस्ट', 'type' => 'URL', 'icon' => 'bx bxl-pinterest', 'is_active' => 1],
            ['name' => 'साउंडक्लाउड', 'type' => 'URL', 'icon' => 'bx bxl-soundcloud', 'is_active' => 1],
            ['name' => 'वीमियो', 'type' => 'URL', 'icon' => 'bx bxl-vimeo', 'is_active' => 1],
            ['name' => 'ड्रिब्बल', 'type' => 'URL', 'icon' => 'bx bxl-dribbble', 'is_active' => 1],
            ['name' => 'बेहांस', 'type' => 'URL', 'icon' => 'bx bxl-behance', 'is_active' => 1],
            ['name' => 'फ़्लिकर', 'type' => 'URL', 'icon' => 'bx bxl-flickr', 'is_active' => 1],
            ['name' => 'यूट्यूब', 'type' => 'URL', 'icon' => 'bx bxl-youtube', 'is_active' => 1],
            ['name' => 'टिकटॉक', 'type' => 'URL', 'icon' => 'bx bxl-tiktok', 'is_active' => 1],
            ['name' => 'डिस्कॉर्ड', 'type' => 'URL', 'icon' => 'bx bxl-discord', 'is_active' => 1],
            ['name' => 'ट्विच', 'type' => 'URL', 'icon' => 'bx bxl-twitch', 'is_active' => 1],
            ['name' => 'गिटहब', 'type' => 'URL', 'icon' => 'bx bxl-github', 'is_active' => 1],
            ['name' => 'पेपल', 'type' => 'URL', 'icon' => 'bx bxl-paypal', 'is_active' => 1],
        ];

        DB::table('dynamic_fields')->insert($fields);
    
    }
}
