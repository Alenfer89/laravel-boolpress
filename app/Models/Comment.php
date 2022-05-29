<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post (){
        $this->belongsTo('App\Models\Post');
    }

    public function user (){
        $this->belongsTo('App\User');
    }
}
