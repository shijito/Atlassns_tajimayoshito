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
        <tr class="username-form">
          <!--username-->
          @if($errors->has('username'))  <!--has()でエラー文の1つを指定して表示できる-->
            {{ $errors->first('username') }}
          @endif 
          <th class="user-name">user name</th>
          <td><input class="profile-input" type="text" class="text" name="username" value="{{$user->username}}"></td><!--Usercontroller　profileでuser情報を取得してその中からusernameのみを取得。userテーブルの中のカラム情報を取り出している-->
        </tr>
        <tr class="mail-form">
          <!--mail-->
          @if($errors->has('mail'))  <!--has()でエラー文の1つを指定して表示できる-->
            {{ $errors->first('mail') }}
          @endif 
          <th class="mail-adress">mail adress</th>
          <td><input class="profile-input" type="text" name="mail" value="{{$user->mail}}"></td><!--Usercontroller　profileでuser情報を取得してその中からmailのみを取得-->
        </tr>
        <tr class="password-form">
          <!--password-->
          @if($errors->has('newpassword'))  <!--has()でエラー文の1つを指定して表示できる-->
            {{ $errors->first('newpassword') }}
          @endif 
          <th class="password">password</th>
          <td><input class="profile-input" type="password" name="newpassword" ></td>
        </tr>
        <tr class="password-form">
          <!--password-->
          <th class="password-confirm">password confirm</th>
          <td><input class="profile-input" type="password" name="newpassword_confirmation"></td>
        </tr>
        <tr class="bio-form">
          <!--bio-->
          @if($errors->has('bio'))  <!--has()でエラー文の1つを指定して表示できる-->
            {{ $errors->first('bio') }}
          @endif 
          <th class="bio">bio</th>
          <td><input class="profile-input" type="text" name="bio" value="{{$user->bio}}"></td><!--Usercontroller　profileでuser情報を取得してその中からbioのみを取得-->
        </tr>
        <tr class="image-form">
          <!--image-->
          @if($errors->has('iconimage'))  <!--has()でエラー文の1つを指定して表示できる-->
            {{ $errors->first('iconimage') }}
          @endif 
          <th class="icon-image">icon image</th>
          <td class="iconimage"><input type="file" name="iconimage"></td>
        </tr> 
      </table>
      <div class="btn-update">
        <!-- <input type="submit" name="btn-update" class="btn btn-primary"></input>更新ボタン -->
        <button type="submit" class="btn btn-primary">更新</button>
      </div>
    </form>
  </div>
</div>
@endsection