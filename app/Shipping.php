<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    //
    protected $guarded = [''];
    public function company(){
        return $this->belongsTo(Shippingcompanies::class);
    }
}
