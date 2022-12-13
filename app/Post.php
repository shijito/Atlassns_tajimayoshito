<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    public function follow()
    { 
        return $this->belongsTo('App\Follow');
    }

    public function user()
    { 
        return $this->belongsTo('App\User');
    }

    public function posts()
    { 
        return $this->hasmany('App\User');
    }

}
