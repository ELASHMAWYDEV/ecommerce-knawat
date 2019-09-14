<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //
    protected $fillable=['site_name','site_name_e','site_email','logo',
    'facebook_link','youtube_link','twitter_link','linkedin_link','instagram_link','contact_us_email','address','phone'];
}
