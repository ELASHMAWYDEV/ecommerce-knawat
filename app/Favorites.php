<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    //
    protected $fillable = ['user_id','sku'];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
