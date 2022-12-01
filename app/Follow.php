<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
    public function post()
    {
        return $this->hasMany('App\Post');
    }

    
}
