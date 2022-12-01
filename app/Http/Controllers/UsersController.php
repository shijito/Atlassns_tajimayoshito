<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\support\Facades\Auth;

use App\User;                //User.phpを適用させる
use App\Follow;              //Follow.phpを適用させる
use App\Post;

class UsersController extends Controller
{
    //auth認証
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //プロフィール
    public function profile(){

        $user = Auth::user();
        return view('users.profile' , ['user'=>$user]); //ログインユーザーを表示させる
    }

    public function profileupdate(Request $request){
        
        $user = Auth::id();

        $image = $request->file('iconimage')->store('public/images');
        
        User::where('id', $user)->update([      //idとログインユーザーのidが一致するもの
        'username' => $request->input('username'),
        'mail' => $request->input('mail'),
        'password' => bcrypt($request->input('newpassword')),
        'bio' => $request->input('bio'),
        'images' => basename($image),
        ]);
        
        return back();

    }


    //検索を一覧表示
    public function search(){

        $searchlist = \DB::table('users')->get();
        return view('users.search' , ['searchlist'=>$searchlist]);
    }

    //検索したものを表示する
    public function usersearch(Request $request)
    {

        $search_name = $request->usersearch;
        
        if(!empty($search_name)) {
            $query = User::query();
            $searchlist = $query->where('username','like', '%' .$search_name. '%')->get();
            return view('users.search')->with([  //表示させるもの
              'searchlist' => $searchlist,       //リスト表示させる
              'keyword_name' => $search_name,   //検索したキーワードを表示する
            ]);
        }

        if(empty($search_name)) {  //検索が空だったらリストを表示する
            $searchlist = \DB::table('users')->get();
            return view('users.search' , ['searchlist'=>$searchlist]);
        }
    }

    //参考から追加↓

    // フォローする
    public function follow($id)           //$searchlist->idを$idで表記
    {
        $follow = Auth::id();             //$followにログインユーザーidを代入
        // フォローしているか
        \DB::table('follows')->insert([
            'following_id' => $follow,    //following_idカラムの中に$follow = Auth::id();を登録する
            'followed_id' => $id,         //followed_idカラムの中にsearch.bladeの$searchlist->idを登録する
        ]);
        return back();
    }

    // フォロー解除 　where(カラム名,演算子,第一引数のカラム名に対する値)　今回はandの場合
    public function unfollow($id)   //$searchlist->idを$idで表記
    {
        $follower = Auth::id();
        \DB::table('follows')
            ->where('followed_id', $id)  //followed_idと$idの一致するものと、（and）
            ->where('following_id',$follower) //following_idと$followerの一致するものを
            ->delete();                  //削除する
        return back();
        
    }



    public function followsprofile($id){

        //userテーブルidと取得したidが一致する人の情報を取得する
        $otherprofile = User::where('id',$id)->get();
        //postsテーブルとusersテーブルをつなげる。where条件としてpostsのuser_idと取得したidが一致する情報を取得
        $otherposts = Post::with('user')->where('user_id', $id)->latest()->get();
        //条件のwhereとwhereinの使い分けの理解が必要

        return view('users.followsprofile')->with([
            'otherprofile'=>$otherprofile, 'otherposts'=>$otherposts
        ]);
    }

    
}