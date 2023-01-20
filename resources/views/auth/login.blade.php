@extends('layouts.logout')

@section('content')

<div class="atlass-logout">
    {!! Form::open() !!}

        <p class="atlassns"> AtlasSNSへようこそ</p>
        <div class="login-maillabel">
            {{ Form::label('mail adress') }}
        </div>
        <div class="login-maillform">
            {{ Form::text('mail',null,['class' => 'input']) }}
        </div>
        <div class="login-passlabel">
            {{ Form::label('password') }}
        </div>
        <div class="login-passform">
            {{ Form::password('password',['class' => 'input']) }}
        </div>
        <div class="login-btn">
            {{ Form::submit('ログイン',['class' => 'loginbtn']) }}
        </div>
        <div class="atlassns-add">
            <p><a href="/register">新規ユーザーの方はこちら</a></p>
        </div>
    {!! Form::close() !!}
</div>


@endsection


