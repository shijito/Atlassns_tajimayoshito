@extends('layouts.login')

@section('content')

<div class="allfollowList">
    @foreach ($follow_user as $follow_user)
        <tr>
              <!--ログインユーザーがフォローした人の一覧を表示する-->
            
            <td>{{ $follow_user->username }}</td>
            
        </tr>
        
    @endforeach
</div>

@endsection