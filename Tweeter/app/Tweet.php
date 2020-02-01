<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $table = 'tweets';

    function users(){
        return $this->belongsTo('App\User');
    }
    function likes(){
        return $this->hasMany('App\Like');
    }
    function comments(){
        return $this->hasMany('App\Comment');
    }
}
