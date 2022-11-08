@extends('layouts.login')

@section('content')

<form action="/profile" method="post" enctype="multipart/form-data"><!--enctype=”multipart/form-data”は画像を送信する際のおまじない-->
  @csrf
  <dl class="UserProfile">    
      <!--username-->
      <dt>user name</dt>
      <dd><input type="text" name="username" value="{{$user->username}}"></dd><!--Usercontroller　profileでuser情報を取得してその中からusernameのみを取得。userテーブルの中のカラム情報を取り出している-->
      <!--mail-->
      <dt>mail adress</dt>
      <dd><input type="text" name="mail" value="{{$user->mail}}"></dd><!--Usercontroller　profileでuser情報を取得してその中からmailのみを取得-->
      <!--password-->
      <dt>password</dt>
      <dd><input type="password" name="newpassword"></dd>
      <!--password-->
      <dt>password confirm</dt>
      <dd><input type="password" name="newpassword_confirmation"></dd>
      <!--bio-->
      <dt>bio</dt>
      <dd><input type="text" name="bio" value="{{$user->bio}}"></dd><!--Usercontroller　profileでuser情報を取得してその中からbioのみを取得-->
      <!--image-->
      <dt>icon image</dt>
      <dd><input type="file" name="iconimage"></dd> 
  </dl>
  <input type="submit" name="profileupdate">更新</button><!--更新ボタン-->
</form>


@endsection