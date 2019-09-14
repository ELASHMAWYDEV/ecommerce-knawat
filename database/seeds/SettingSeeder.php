<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Settings::create([
            'site_name'=>'site_name',
            'site_name_e'=>'site_name_e',
            'site_email'=>'example@gmail.com',
            'contact_us_email'=>'example@gmail.com',
            'facebook_link'=>'https://www.facebook.com',
            'twitter_link'=>'https://www.twitter.com',
            'instagram_link'=>'https://www.instagram.com',
            'linkedin_link'=>'https://www.linkedin.com',
            'youtube_link'=>'https://www.youtube.com',
            'logo'=>'logo.png',
            'address'=>'address city example',
            'phone'=>'5666778995256'
       ]);
    }
}
