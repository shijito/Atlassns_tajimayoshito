<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
            <div class="head-wrapper">
                <div class="head-block left">
                    <a href="/top"><img src="{{asset('images/atlas.png')}}"></a>
                </div>
                <div class="head-block nameview">
                    <p>{{ Auth::user()->username }}　　さん</p>
                </div>
                <div class="head-block menuber">
                    <div class="menuber-01">
                        <p class="arrow bottom"></p>
                        <div class="submenu01">
                            <ul>
                                <!-- <li><a href="/top">ホーム</a></li>
                                <li><a href="/profile">プロフィール</a></li>
                                <li><a href="/logout">ログアウト</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="menu">
                        <input type="checkbox" id="menu_bar01"/>
                        <label for="menu_bar01"></label>
                        <ul id="links01">
                            <li><a href="/top">ホーム</a></li>
                            <li><a href="/profile">プロフィール</a></li>
                            <li><a href="/logout">ログアウト</a></li>
                        </ul>
                    </div> -->
                </div>
                <div class="head-block usericon">
                    <img src="{{asset('storage/images/' . Auth::user()->images )}}" />
                </div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="side-bar-username">{{ Auth::user()->username }}さんの</p>
                <div class="side-bar-content">
                    <p class="side-bar-content">フォロー数</p>
                    <p class="side-bar-content-number1">{{ Auth::user()->follows()->get()->count() }}人</p>
                </div>
                <p class="btn list"><a href="/followList">フォローリスト</a></p>
                <div class="side-bar-content">
                    <p class="side-bar-content">フォロワー数</p>
                    <p class="side-bar-content-number2">{{ Auth::user()->followUsers()->get()->count() }}人</p>
                </div>
                <p class="btn list"><a href="/followerList">フォロワーリスト</a></p>
            </div>
            <p class="btn-user-search">
                <a href="/search">ユーザー検索</a>
            </p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="js/script.js"></script>
</body>
</html>