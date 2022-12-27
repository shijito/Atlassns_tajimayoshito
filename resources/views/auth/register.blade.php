@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

<!--usernameー-->
@if($errors->has('username'))  <!--has()でエラー文の1つを指定して表示できる-->
	{{ $errors->first('username') }}
@endif 
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}

<!--mail-->
@if($errors->has('mail'))  <!--has()でエラー文の1つを指定して表示できる-->
	{{ $errors->first('mail') }}
@endif 
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}

<!--password-->
@if($errors->has('password'))  <!--has()でエラー文の1つを指定して表示できる-->
	{{ $errors->first('password') }}
@endif 
{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
