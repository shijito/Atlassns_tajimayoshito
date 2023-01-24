@extends('layouts.login')

@section('content')

@if($errors->has('tweet'))  <!--has()でエラー文の1つを指定して表示できる-->
	{{ $errors->first('tweet') }}
@endif 

<div class="common-top">
  <div class="user-form">
    <div class="top-usericon">
      <img src="{{asset('storage/images/' . Auth::user()->images )}}" />  
    </div>

    <div class="form-group">
      {!! Form::open(['url' => '/create']) !!}
      {{ csrf_field() }}
        <div class="tweet-form">
          {!! Form::input('text','tweet', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
        </div>
        <div class="">
          <input type="image" src="images/post.png" class="btn btn-success pull-right">
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


<div class="showtimeline">
  @foreach ($timeline as $timeline) 
    @if(Auth::user()->isFollowing($timeline->user->id) || $timeline->user_id === Auth::id()) <!--authuserがフォローしているユーザーかつ、つぶやきをしているユーザーがログインユーザーと一致を表示-->
      <div class="follow-timeline"> 
        <table class="follow-content" >
          <tr>
            <td rowspan="2" class="follow-icon"><img src="{{asset('storage/images/' . $timeline->user->images )}}" /></td>
            <td class="follow-username">{{ $timeline->user->username }}<td><!--ユーザー名を表示させる必要がある-->
            <td class="follow-tweettime">{{ $timeline->created_at }}</td>
          </tr>
          <tr>
            <td colspan="2" class="follow-tweet">{{ $timeline->post }}</td>  
          </tr>
        </table>
      </div>
    <!--編集（アップデート）-->
      @if(!Auth::user()->isFollowing($timeline->user->id))
        <div class="content">
        @csrf
          <!-- 投稿の編集ボタン -->
          <a class="js-modal-open" href="/update" post="{{ $timeline->post }}" post_id="{{ $timeline->id }}" ><img src="images/edit.png"></a>
          
        </div>
        <!--削除ボタン-->
        <form action="/trash" method="post">
        @csrf
          <!--入力フォームからサーバーへ送信する初期値を指定(value)して、見えないように隠す(hidden)-->
          <input type="hidden" value="{{ $timeline->id }}" name="id"> <!--valueでidを取り出して指定-->
          <input type="image" src="{{ asset('images/trash-h.png') }}" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
        </form>
      @endif
    @endif
  @endforeach
</div>
 <!--ツイート編集モーダルの中身 --><!--jsでモーダルの仕組みを設定し、コントローラーで処理している-->
    <div class="modal js-modal">
            <div class="modal__bg js-modal-close"></div>
            <div class="modal__content">
              <form action="/update" method="post">
              @csrf
                    <textarea name="uppost" class="modal_post"></textarea>
                    <input type="hidden" name="id" class="modal_id" value="">
                    <input type="image" src="{{ asset('images/edit.png') }}">
              </form>
              <a class="js-modal-close" href="/update">閉じる</a>
            </div>
    </div> 


@endsection