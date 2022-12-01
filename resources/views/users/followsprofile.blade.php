@extends('layouts.login')

@section('content')
<dl class="UserProfile">
    @foreach ($otherprofile as $otherprofile)
<!--取得したidの人の画像-->
        <dt><img src="{{asset('storage/images/' . $otherprofile->images )}}" /></dt>
<!--取得したidの人のname-->
        <dt>{{ $otherprofile -> username }}</dt>
<!--取得したidの人のbio-->
        <dt>{{ $otherprofile -> bio }}</dt>
    @endforeach
<!--取得したidの人のフォローボタン-->
<!--取得したidの人の画像とつぶやき-->
</dl>

@endsection
