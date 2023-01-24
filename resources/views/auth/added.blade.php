@extends('layouts.logout')

@section('content')

<div class="clear">
  <div class="text-top">
    <p>{{$name}}さん</p>
    <p>ようこそ！AtlasSNSへ！</p>
  </div>
  
  <div class="text-bottom">
    <p>ユーザー登録が完了しました。<br>
       早速ログインをしてみましょう。
    </p>
  </div>
  
  <div class="add-btn">
    <p class="btn">
      <button class="addbtn"><a href="/login">ログイン画面へ</a></button>
    </p>
  </div>
</div>





@endsection