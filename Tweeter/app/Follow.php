<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follows';

    function users(){
        return $this->belongsTo('App\User');
    }
}
