@extends('layouts.login')

@section('content')
<dl class="UserProfile">
<!--取得したidの人の画像-->
<dt>{{ $otherprofile -> images }}</dt>
<!--取得したidの人のname-->
<dt>user name</dt>
<!--取得したidの人のbio-->
<dt>user name</dt>
<!--取得したidの人のフォローボタン-->
<!--取得したidの人の画像とつぶやき-->
</dl>

@endsection