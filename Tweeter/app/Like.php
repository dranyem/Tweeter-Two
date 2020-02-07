<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    function users(){
        return $this->belongsTo('App\User', 'user_id');
    }
    function tweets(){
        return $this->belongsTo('App\Tweet' ,'tweet_id');
    }
}
