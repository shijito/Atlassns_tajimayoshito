@extends('layouts.login')

@section('content')
<div class="common-top">
    <div class="allfollowList">
        <p class="follow-text">Follower List</p>
        <div class="allfollow-icon">
            @foreach ($follower_user as $follower_user)
                <tr>
                    <!--ログインユーザーのフォロワーの一覧を表示する-->
                    <td><a href="/follows/{{ $follower_user->id }}"><img src="{{asset('storage/images/' . $follower_user->images )}}" /></a><td>
                </tr>
            @endforeach
        </div>
    </div>
</div>

<div class="followList-timeline">
    @foreach ($followerpost as $followerpost)
    <div class="follow-timeline">
        <table class="follow-content" >
            <tr>
                <td rowspan="2" class="follow-icon"><a href="/follows/{{ $followerpost->user->id }}"><img src="{{asset('storage/images/' . $followerpost->user->images )}}"  /></a></td>
                <td class="follow-username">{{ $followerpost->user->username }}</td>
                <td class="follow-tweettime">{{ $followerpost->created_at }}</td>
            </tr>
            <tr>
                <td colspan="2" class="follow-tweet">{{ $followerpost->post }}</td>
            </tr>
        </table>
    </div>
    @endforeach
</div>

@endsection