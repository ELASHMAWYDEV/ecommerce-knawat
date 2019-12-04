<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailingList extends Model
{
    //
    public $guarded = [];
    public function getRouteKeyName(){
        return 'email';
    }
}
