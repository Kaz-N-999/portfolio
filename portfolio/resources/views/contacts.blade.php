<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/info">旅行写真記録アプリ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/info">登録画面</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Google MAP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/list">履歴閲覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/contact">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ログアウト</a>
                    </li>
            </div>
        </div>
    </nav>
    <!-- お問い合わせフォーム -->
    <form method="POST" action="/finish">
        @csrf

        <label>メールアドレス</label>
        <input type="text" name="email" value="" >
        <!-- バリデーションにはじかれた場合エラーメッセージを表示 -->
        @if ($errors->has('email'))
        <p class="error-message">{{ $errors->first('email') }}</p>
        @endif

        <label>タイトル</label>
        <input type="text" name="title" value="お問い合わせ" >
        <!-- バリデーションにはじかれた場合エラーメッセージを表示 -->
        @if ($errors->has('title'))
        <p class="error-message">{{ $errors->first('title') }}</p>
        @endif

        <label>お問い合わせ内容</label>
        <!-- oldヘルパは直前の内容を表示する -->
        <textarea name="body">{{ old('body') }}</textarea>
        <!-- バリデーションにはじかれた場合エラーメッセージを表示 -->
        @if ($errors->has('body'))
        <p class="error-message">{{ $errors->first('body') }}</p>
        @endif

        <button type="submit">送信</button>
    </form>

    <footer class="bg-dark text-center">
        <div class="container">
            <p class="my-0 text-white py-3">&copy;Trip report</p>
        </div>
    </footer>
</body>

</html>