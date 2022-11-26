@extends('layouts.login')

@section('content')

<div class="allfollowList">
    @foreach ($follow_user as $follow_user)
    <tr>
        <!--ログインユーザーがフォローした人の一覧を表示する-->
        <td><a href="/followList/{{ $follow_user->id }}"><img src="{{asset('storage/images/' . $follow_user->images )}}" /></a><td>
    <tr>
    @endforeach
</div>

<div class="followList_timeline">
    @foreach ($followpost as $followpost)
    <tr>
        <td><img src="{{asset('storage/images/' . $followpost->user->images )}}" /><td>
        <td>{{ $followpost->post }}</td>
        <td>{{ $followpost->created_at }}</td>
    </tr>
    @endforeach
</div>

@endsection