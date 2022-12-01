@extends('layouts.login')

@section('content')

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
    @foreach ($otherposts as $otherposts)
        <tr>
            <td><img src="{{asset('storage/images/' . $otherposts->user->images )}}" /></td>
            <td>{{ $otherposts -> post }}</td>
        </tr>
    @endforeach

@endsection
