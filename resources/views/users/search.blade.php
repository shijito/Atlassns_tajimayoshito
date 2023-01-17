@extends('layouts.login')

@section('content')
<div class="common-top">
  <form action="/usersearch" method="post">
    <div class="search-block">
      @csrf
      <div class="usersearc-form">
        <input class="search-form" type="text" name="usersearch" placeholder="ユーザー名">
      </div>
      <div class="my-parts">
          <input type="image" src="{{ asset('images/search-icon.png') }}" class="btn btn-search">
      </div>
    </div>
  </form>
</div>

@if(!empty($search_name)) <!--空ではなく、検索が入力されたら表示する-->
  <p>検索ワード：{{ $search_name }}</p> <!--useacontrollerのキーワード検索を表示する場所-->
@endif

<div class="showsearch">
<!--自分以外-->
  @foreach ($searchlist as $searchlist)
    @if(Auth::id() != $searchlist->id) <!--usercontroller-->
        <tr class="searchresult">
          <td class="searchresult-image"><img src="{{asset('storage/images/' . $searchlist->images )}}" /></td>
          <td class="searchresult-username">{{ $searchlist->username }}</td>  <!--総リストのログインユーザーIDではないものを表示する-->
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