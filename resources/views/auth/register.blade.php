@extends('layouts.logout')

@section('content')
<div  class="register">
	{!! Form::open() !!}

	<h2 class="addatlassns">新規ユーザー登録</h2>

	<!--usernameー-->
	@if($errors->has('username'))  <!--has()でエラー文の1つを指定して表示できる-->
		{{ $errors->first('username') }}
	@endif 
	
	<div class="login-username">
		{{ Form::label('username') }}
	</div>
	
	<div class="login-nameform">
		{{ Form::text('username',null,['class' => 'input']) }}
	</div>
	
	<!--mail-->
	@if($errors->has('mail'))  <!--has()でエラー文の1つを指定して表示できる-->
		{{ $errors->first('mail') }}
	@endif 
	
	<div class="login-addmaillabel">
		{{ Form::label('maill adress') }}
	</div>
	
	<div class="login-addmaillform">
		{{ Form::text('mail',null,['class' => 'input']) }}
	</div>
	
	<!--password-->
	@if($errors->has('password'))  <!--has()でエラー文の1つを指定して表示できる-->
		{{ $errors->first('password') }}
	@endif 

	<div class="login-passlabel">
		{{ Form::label('password') }}
	</div>
	
	<div class="login-passform">
		{{ Form::text('password',null,['class' => 'input']) }}
	</div>
	
	<div class="login-passlabel">
		{{ Form::label('password comfirm') }}
	</div>
	
	<div class="login-passform">
	{{ Form::text('password_confirmation',null,['class' => 'input']) }}
	</div>
	
	<div class="register-btn">
		{{ Form::submit('REGISTER',['class' => 'registerbtn']) }}
	</div>
	
	<div class="atlassns-add">
		<p><a href="/login">ログイン画面へ戻る</a></p>
	</div>
	{!! Form::close() !!}

</div>

@endsection