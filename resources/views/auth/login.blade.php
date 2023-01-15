@extends('layouts.logout')

@section('content')

<div class="atlass-logout">
    {!! Form::open() !!}

        <p class="atlassns"> AtlasSNSへようこそ</p>

        {{ Form::label('e-mail') }}
        {{ Form::text('mail',null,['class' => 'input']) }}
        {{ Form::label('password') }}
        {{ Form::password('password',['class' => 'input']) }}

        {{ Form::submit('ログイン') }}

        <p><a href="/register">新規ユーザーの方はこちら</a></p>

    {!! Form::close() !!}
</div>

@endsection