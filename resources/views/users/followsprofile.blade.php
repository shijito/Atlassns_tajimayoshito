@extends('layouts.login')

@section('content')
<div class="common-top">
    @foreach ($otherprofile as $otherprofile)
<!--取得したidの人の画像-->
        <dt><img src="{{asset('storage/images/' . $otherprofile->images )}}" /></dt>
<!--取得したidの人のname-->
        <dt>name</dt>
        <dt>{{ $otherprofile -> username }}</dt>

<!--取得したidの人のbio-->
        <dt>bio</dt>
        <dt>{{ $otherprofile -> bio }}</dt>
<!--取得したidの人のフォローボタン-->
        <div class="d-flex justify-content-end flex-grow-1">
            @if(Auth::user()->isFollowing($otherprofile->id))
                <form action="/follows/{{ $otherprofile->id }}/unfollow" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">フォロー解除</button>
                </form>
            @else
                <form action="/follows/{{ $otherprofile->id }}/follow" method="post"> <!--urlにリストのidを取り出す-->
                    @csrf
                    <button type="submit" class="btn btn-primary">フォローする</button>
                </form>
            @endif
        </div>
    @endforeach
</div>
    


<!--取得したidの人の画像とつぶやき-->
    @foreach ($otherposts as $otherposts)
        <tr>
            <td><img src="{{asset('storage/images/' . $otherposts->user->images )}}" /></td>
            <td>{{ $otherposts -> post }}</td>
        </tr>
    @endforeach

@endsection
