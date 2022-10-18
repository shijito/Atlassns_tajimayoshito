<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\support\Facades\Auth;

use app\User;                //User.phpを適用させる
use app\Follow;              //Follow.phpを適用させる
use app\Post;

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
        $follow_user = $user -> follows() ->get(); //User.phpのfollowsを引っ張ってきている
        
        return view('follows.followList' , ['follow_user'=>$follow_user]);
    }

    public function followpostlist(){

        $followpost = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->latest()->get();
        
        return view('follows.followList')->with([
            'followpost' => $followpost,
            ]);
    }



    //フォロワー系
    //フォロワーリスト表示
    public function followerList(){

        $user = Auth::user(); //ログインユーザーを取得
        $follow_user = $user -> followUsers() ->get();
        return view('follows.followerList' , ['follow_user'=>$follow_user]);
    }
}
