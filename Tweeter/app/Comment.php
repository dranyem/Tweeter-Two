<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    function tweets(){
        return $this->belongsTo('App\Tweet', 'tweet_id');
    }
    function users(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
