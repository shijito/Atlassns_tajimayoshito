@extends('layouts.login')

@section('content')

<form action="/usersearch" method="post">
  <div class="form-group">
    @csrf
    <input type="text" name="usersearch" placeholder="ユーザー名">
    <input type="submit" class="btn btn-success pull-right">
  </div>
</form>

@if(!empty($search_name)) <!--空ではなく、検索が入力されたら表示する-->
  <p>検索ワード：{{ $search_name }}</p> <!--useacontrollerのキーワード検索を表示する場所-->
@endif

<div class="showsearch">
<!--自分以外-->
  @foreach ($searchlist as $searchlist)
    @if(Auth::id() != $searchlist->id) <!--usercontroller-->
        <tr>
          <td>{{ $searchlist->username }}</td>  <!--総リストのログインユーザーIDではないものを表示する-->
        </tr>  
      <div class="d-flex justify-content-end flex-grow-1">
        @if(Auth::user()->isFollowing($searchlist->id))
          <form action="/usersearch/{{ $searchlist->id }}/unfollow" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">フォロー解除</button>
          </form>
        @else
          <form action="/usersearch/{{ $searchlist->id }}/follow" method="post"> <!--urlにリストのidを取り出す-->
            @csrf
            <button type="submit" class="btn btn-primary">フォローする</button>
          </form>
        @endif
      </div>
    @endif    
  @endforeach
</div> 






@endsection