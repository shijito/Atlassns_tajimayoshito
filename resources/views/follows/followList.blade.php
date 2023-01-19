@extends('layouts.login')

@section('content')
<div class="common-top">
    <div class="allfollowList">
        <p class="follow-text">Follow List</p>
        <div class="allfollow-icon">
            @foreach ($follow_user as $follow_user)
            <tr>
                <!--ログインユーザーがフォローした人の一覧を表示する-->
                <td><img src="{{asset('storage/images/' . $follow_user->images )}}" /><td>
            <tr>
            @endforeach
        </div>
    </div>
</div>

<div class="followList-timeline">
    @foreach ($followpost as $followpost)
    <div class="follow-timeline">
        <table class="follow-content" >
            <tr>
                <td rowspan="2" class="follow-icon" ><a href="/follows/{{ $followpost->user->id }}"><img src="{{asset('storage/images/' . $followpost->user->images )}}" /></a></td>
                <td class="follow-username">{{ $followpost->user->username }}</td>
                <td class="follow-tweettime">{{ $followpost->created_at }}</td>
            </tr>
            <tr>
                <td colspan="2" class="follow-tweet">{{ $followpost->post }}</td>
            </tr>
            <!-- <tr>
                <th class="follow-icon" ><a href="/follows/{{ $followpost->user->id }}"><img src="{{asset('storage/images/' . $followpost->user->images )}}" /></a></th>
                <td class="follow-username">{{ $followpost->user->username }}</td>
                <td class="follow-tweet">{{ $followpost->post }}</td>
                <td class="follow-tweettime">{{ $followpost->created_at }}</td>
            </tr> -->
        </table>
    </div>
    @endforeach
</div>

@endsection