@extends('layouts.login')

@section('content')
<div class="UserProfile">
  <div class="profile-image">
    <img src="{{asset('storage/images/' . Auth::user()->images )}}" />
  </div>

  <div class="form">
    <form action="/profile" method="post" enctype="multipart/form-data"><!--enctype=”multipart/form-data”は画像を送信する際のおまじない-->
      @csrf
      <table class="profileupdate">    
        <tr>
          <!--username-->
          @if($errors->has('username'))  <!--has()でエラー文の1つを指定して表示できる-->
            {{ $errors->first('username') }}
          @endif 
          <th>user name</th>
          <td><input type="text" class="text" name="username" value="{{$user->username}}"></td><!--Usercontroller　profileでuser情報を取得してその中からusernameのみを取得。userテーブルの中のカラム情報を取り出している-->
        </tr>
        <tr>
          <!--mail-->
          @if($errors->has('mail'))  <!--has()でエラー文の1つを指定して表示できる-->
            {{ $errors->first('mail') }}
          @endif 
          <th>mail adress</th>
          <td><input type="text" name="mail" value="{{$user->mail}}"></td><!--Usercontroller　profileでuser情報を取得してその中からmailのみを取得-->
        </tr>
        <tr>
          <!--password-->
          @if($errors->has('newpassword'))  <!--has()でエラー文の1つを指定して表示できる-->
            {{ $errors->first('newpassword') }}
          @endif 
          <th>password</th>
          <td><input type="password" name="newpassword" ></td>
        </tr>
        <tr>
          <!--password-->
          <th>password confirm</th>
          <td><input type="password" name="newpassword_confirmation"></td>
        </tr>
        <tr>
          <!--bio-->
          @if($errors->has('bio'))  <!--has()でエラー文の1つを指定して表示できる-->
            {{ $errors->first('bio') }}
          @endif 
          <th>bio</th>
          <td><input type="text" name="bio" value="{{$user->bio}}"></td><!--Usercontroller　profileでuser情報を取得してその中からbioのみを取得-->
        </tr>
        <tr>
          <!--image-->
          @if($errors->has('iconimage'))  <!--has()でエラー文の1つを指定して表示できる-->
            {{ $errors->first('iconimage') }}
          @endif 
          <th>icon image</th>
          <td><input type="file" name="iconimage"></td>
        </tr> 
      </table>
      <div class="btn-update">
        <input type="submit" name="btn-update" ></button><!--更新ボタン-->
      </div>
    </form>
  </div>
</div>
@endsection