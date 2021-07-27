<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    function user(){
        return $this->belongsTo('App\User');
    }
    function lesson(){
        return $this->hasMany('App\Lesson');
    }
}
