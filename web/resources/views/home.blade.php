<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>ホーム画面</h1>
        <p>こんにちは！</p>
        @if (Auth::check())
            {{ \Auth::user()->name }}さん
            <a href="/auth/logout">ログアウト</a>
        @else
            <p>ゲストさん</p>
            <a href="/auth/login">ログイン</a>
            <a href="/auth/register">会員登録</a>
        @endif
    </body>
</html>
