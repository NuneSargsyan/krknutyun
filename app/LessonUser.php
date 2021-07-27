<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonUser extends Model
{
    protected $table ='lessons-users';

    public function group(){
        return $this->belongsTo('App\Group');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
