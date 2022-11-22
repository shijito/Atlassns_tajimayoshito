<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //以下追加分
    // フォローする
    public function follow(Int $user_id) 
    {
        return $this->follows()->attach($user_id);  //attachの意味は「つける」。フォローをつける。
    }

    // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id); //detachの意味は「切り離す」。フォローから切り離す。
    }

    // フォローしているか
    public function isFollowing(Int $user_id) 
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->exists();  //booleanは「ブール値」
    }

    // フォロワー→フォロー
    public function followUsers()
    {
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');  //(userテーブル、結びつけるテーブル名、結びつけるカラム1、結びつけるカラム2) usersのidカラムとfollowsのカラムを結びつける
    }

    // フォロー→フォロワー
    public function follows()
    {
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');  //(userテーブル、結びつけるテーブル名、結びつけるカラム1、結びつけるカラム2) usersのidカラムとfollowsのカラムを結びつける
    }

    // フォローされているか
    public function isFollowed(Int $user_id) 
    {
        return (boolean) $this->followUsers()->where('following_id', $user_id)->exists();
    }

    public function posts()
    { 
        return $this->hasMany('App\Post');
    }

}   

