@extends('layouts.login')

@section('content')
<div class="common-top">
    @foreach ($otherprofile as $otherprofile)
    <!-- <div class="followprofile-content"> -->
    <table class="followprofile-table">
            <tr class="content-name">
    <!--取得したidの人の画像-->
                <td rowspan="2" class="followprofile-icon"><img src="{{asset('storage/images/' . $otherprofile->images )}}" /></td>
        <!--取得したidの人のname-->
                <td class="followprofile-name">name</td>
                <td class="followprofile-username">{{ $otherprofile -> username }}</td>
            </tr>    
    <!-- </div> -->
        <tr>
<!--取得したidの人のbio-->
            <td class="followprofile-bio">bio</td>
            <td class="followprofile-comment">{{ $otherprofile -> bio }}</td>
    <!--取得したidの人のフォローボタン-->
            <td class="followprofile-btn">
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
            </td>
        </tr>
    </table>
    @endforeach
</div>

    


<!--取得したidの人の画像とつぶやき-->
<div class="followList-timeline">
    @foreach ($otherposts as $otherposts)
    <div class="follow-timeline">
        <table class="follow-content" >
            <tr>
                <td rowspan="2" class="follow-icon"><img src="{{asset('storage/images/' . $otherposts->user->images )}}" /></td>
                <td class="follow-username">{{ $otherposts -> user->username }}</td>
                <td class="follow-tweettime">{{ $otherposts -> created_at }}</td>
            </tr>
            <tr>
                <td colspan="2" class="follow-tweet">{{ $otherposts -> post }}</td>
            </tr>
        </table>
    </div>
    @endforeach
</div>
@endsection
