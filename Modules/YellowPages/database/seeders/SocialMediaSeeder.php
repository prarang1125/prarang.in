<?php

namespace Modules\YellowPages\Database\Seeders;

use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('social_media_platforms')->insert([
            [
                'name' => 'Facebook',
                'description' => 'A social media platform to connect with friends and family.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [

                'name' => 'Twitter',
                'description' => 'A platform for sharing short thoughts and updates.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Instagram',
                'description' => 'A photo and video-sharing social networking service.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'LinkedIn',
                'description' => 'A professional networking platform.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    
    }
}
