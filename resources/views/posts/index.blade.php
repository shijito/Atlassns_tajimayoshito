@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>

<div class="form-group">
  {!! Form::open(['url' => '/create']) !!}
  {{ csrf_field() }}
    <div class="form-group">
      {!! Form::input('text','tweet', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
    </div>
    <div>
      <input type="image" src="images/post.png" class="btn btn-success pull-right">
    </div>
  {!! Form::close() !!}
</div>

<div class="showtimeline">
  @foreach ($timeline as $timeline)  
    <tr>
      <td><img src="{{asset('storage/images/' . $timeline->user->images )}}" /></td>
      <td>{{ $timeline->user->username }}<td><!--ユーザー名を表示させる必要がある-->
      <td>{{ $timeline->post }}</td>  
      <td>{{ $timeline->created_at }}</td>
    </tr>
    <!--編集（アップデート）-->
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