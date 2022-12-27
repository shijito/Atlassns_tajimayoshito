<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'user_id', 'post' ,
    ];

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
