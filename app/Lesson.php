<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    function group(){
        return $this->belongsTo('App\Group');
    }
}
