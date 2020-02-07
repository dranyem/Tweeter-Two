<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    function users(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
