<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    public $fillable=['sku','user_id','quantity'];
    public function user(){
        return $this->belongsto('App\User');
    }
}
