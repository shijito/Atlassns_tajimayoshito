@extends('layouts.login')

@section('content')

<div class="allfollowList">
    @foreach ($follower_user as $follower_user)
        <tr>
            <!--ログインユーザーのフォロワーの一覧を表示する-->
            <td><img src="{{asset('storage/images/' . $follower_user->images )}}" /><td>
        </tr>
    @endforeach
</div>

<div class="followerList_timeline">
    @foreach ($followerpost as $followerpost)
    <tr>
        <td><a href="/followerList/{{ $followerpost->user->id }}"><img src="{{asset('storage/images/' . $followerpost->user->images )}}" /></a></td>
        <td>{{ $followerpost->post }}</td>
        <td>{{ $followerpost->created_at }}</td>
    </tr>
    @endforeach
</div>

@endsection