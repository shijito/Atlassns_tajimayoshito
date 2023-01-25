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

    <!-- <div class="form-group"> -->
      {!! Form::open(['url' => '/create' , 'class'=>'top-form']) !!}
      {{ csrf_field() }}
        <!-- <div class="tweet-form"> -->
          {!! Form::input('text','form-tweet', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
        <!-- </div> -->
        <!-- <div class="tweet-btn"> -->
          <input type="image" src="images/post.png" class="btn btn-success pull-right">
        <!-- </div> -->
      {!! Form::close() !!}
    <!-- </div> -->
  </div>
</div>


<div class="followList-timeline">
  @foreach ($timeline as $timeline) 
    @if(Auth::user()->isFollowing($timeline->user->id) || $timeline->user_id === Auth::id()) <!--authuserがフォローしているユーザーかつ、つぶやきをしているユーザーがログインユーザーと一致を表示-->
      <div class="tweet-timeline"> 
        <table class="tweet-content" >
          <tr>
            <td rowspan="2" class="tweet-icon"><img src="{{asset('storage/images/' . $timeline->user->images )}}" /></td>
            <td class="follow-username">{{ $timeline->user->username }}<td><!--ユーザー名を表示させる必要がある-->
            <td class="follow-tweettime">{{ $timeline->created_at }}</td>
          </tr>
          <tr>
            <td colspan="2" class="follow-tweet">{{ $timeline->post }}</td>  
          </tr>
          <tr class="edit-trash">
            @if(!Auth::user()->isFollowing($timeline->user->id))
              <td class="content-postedit" colspan="7"><a class="js-modal-open" href="/update" post="{{ $timeline->post }}" post_id="{{ $timeline->id }}" ><img src="images/edit.png"></a></td>
              <td class="content-posttrash">
                <form action="/trash" method="post" class="tweet-trash">
                  @csrf
                  <!--入力フォームからサーバーへ送信する初期値を指定(value)して、見えないように隠す(hidden)-->
                  <input type="hidden" value="{{ $timeline->id }}" name="id"> <!--valueでidを取り出して指定-->
                  <input type="image" src="{{ asset('images/trash-h.png') }}" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
                </form>
              </td>
            @endif  
          </tr>
        </table>
      </div>
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