<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\support\Facades\Auth;

use App\User;                //User.phpを適用させる
use App\Follow;              //Follow.phpを適用させる
use App\Post;

class FollowsController extends Controller
{
    //auth認証
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //フォロー系    
    //フォローリスト表示
    public function followList(){

        $user = Auth::user(); //ログインユーザーを取得
        $follow_user = $user -> follows() ->get(); //User.phpのfollowsを引っ張ってきている。ログインユーザーとfollowsテーブルをつなげて、フォローの情報を取得する。
        $followpost = Post::with('user')->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->latest()->get();
        //↑postwith(user)がpostとuserテーブルをつなげる。postsテーブルのuser_idとログインユーザーのfollowsテーブルのfollowed_idの一致するものを取得する。

        return view('follows.followList')->with([
            'follow_user'=>$follow_user,'followpost' => $followpost
            ]);
    }


    //フォロワー系
    //フォロワーリスト表示
    public function followerList(){

        $user = Auth::user(); //ログインユーザーを取得
        $follower_user = $user -> followUsers() ->get();
        $followerpost = Post::with('user')->whereIn('user_id', Auth::user()->followUsers()->pluck('following_id'))->latest()->get();
        
        return view('follows.followerList')->with([
            'follower_user'=>$follower_user , 'followerpost' => $followerpost 
            ]);
    }


    




}
