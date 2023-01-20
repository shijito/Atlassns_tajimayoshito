@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="text-top">
    <p>{{$name}}さん</p>
    <p>ようこそ！AtlasSNSへ！</p>
  </div>
  
  <div class="text-bottom">
    <p>ユーザー登録が完了しました。</p>
    <p>早速ログインをしてみましょう。</p>
  </div>
  
  <div class="login-btn">
    <p class="btn"><a href="/login">ログイン画面へ</a></p>
  </div>
</div>





@endsection