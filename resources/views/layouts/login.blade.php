<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="top" content="トップページ" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="16x16" type="image/png" />
    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="32x32" type="image/png" />
    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="48x48" type="image/png" />
    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="{{ asset('favicon.png') }}" />
    <!--OGPタグ/twitterカード-->
</head>

<body>
    <header class="header" id="head">
        <div>
            <h1><a href="/top"><img src="{{ asset('images/atlas.png') }} " alt="atlasのロゴ"></a></h1>
        </div>
        <!-- アコーディオンメニュー -->
        <div class="nav" id="nav">
            <p class="nav-open">{{ Auth::user()->username }}　さん</p>
            <img class="icon nav-open" src="{{ asset('images/icon1.png') }}" alt="{{ Auth::user()->username }}さんのアイコン">
            <!-- アコーディオン部分 -->
            <nav>
                <ul>
                    <li><a class="nav-item gray" href="/top">HOME</a></li>
                    <li><a class="nav-item gray" href="/profile">プロフィール編集</a></li>
                    <li><a class="nav-item gray" href="/logout">ログアウト</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div>
        <!-- サイドバー -->
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div>
                    <p>フォロー数</p>
                    <p>〇〇名</p>
                    <!-- <p>{{ Auth::user()->followings }}名</p> -->
                </div>
                <p class="btn-blue"><a class="btn-blue btn-text" href="/follow-list">フォローリスト</a></p>
                <div>
                    <p>フォロワー数</p>
                    <p>〇〇名</p>
                </div>
                <p class="btn-blue"><a class="btn-blue btn-text" href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class=" btn-blue"><a class="btn-blue btn-text" href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <!-- フッター -->
    <footer></footer>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</body>

</html>
