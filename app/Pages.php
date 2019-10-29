<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    //
    public $fillable = ['slug','description','description_ar'];
    public static function findBySlug($slug){
       return Pages::where('slug',$slug)->first();
    }
}
