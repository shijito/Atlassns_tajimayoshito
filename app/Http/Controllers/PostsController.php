<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Post;
use App\Follow;

class PostsController extends Controller
{
    //auth認証
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'tweet' => 'required|string|max:150',
        ]);
    }

    protected function create(array $data)
    {
        return Post::create([
            'tweet' => $data['post'],
        ]);
    }


    
    //ツイートを表示
    public function index(){
        //$timeline = \DB::table('posts')->get(); //データベースのtweets表示をタイムラインと設定
        $timeline = Post::with('user')->orderBy('created_at', 'desc')->get();
        
        return view('posts.index' , ['timeline'=>$timeline]); //return viewは、return view('ファイル');
    }

    //tweetを登録↓
    public function tweet(Request $request){
        $id = Auth::id();   //ログイン中のIDを取得
        //ddd($id);
        $data = $request->input();   //
        $validator = $this->validator($data);
            if($validator->fails()){
              return redirect()->back()
                ->withErrors($validator);
            }
        \DB::table('posts')->insert([       //データベースのpostsに追加
            'post' => $data,                //カラム　ー＞　変数
            'user_id' => $id
        ]);
        return redirect('/top'); //return redirectは、return redirect('url');
    }

    //tweetを削除↓
    public function delete(Request $request)  
    {
        $id = $request->input('id');
        \DB::table('posts')           //データベースのposts
            ->where('id' , $id)       //ID番号を取り出す
            ->delete();               //削除命令
        return redirect('/top');      //トップに戻る

    }

    //tweetを編集↓
    public function update(Request $request)
    {
        $id = $request->input('id');              //index.bladeのモーダル中身のname="id"に繋がる
        $up_post = $request->input('uppost');     //index.bladeのモーダル中身のtextarea name="uppost"に繋がる
        \DB::table('posts')                       //データベースのposts
            ->where('id', $id)                    //postsテーブルのidとbladeから取ってきたidが一致するもの
            ->update(                             //ツイート編集命令、postsテーブルのレコードを更新
                ['post' => $up_post]
            );

        return redirect('/top');
    }

    





}
