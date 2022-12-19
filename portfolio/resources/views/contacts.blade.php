<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ</title>

    <link rel="stylesheet" href="/info.css">
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
                        <a class="nav-link" href="/map">Google MAP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/list">履歴閲覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/contact">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <form method="post" name='logout' action="logout">
                            @csrf
                            <input type="hidden">
                            <a href="javascript:logout.submit()" class="nav-link">ログアウト</a>
                        </form>
                    </li>
            </div>
        </div>
    </nav>
    <!-- お問い合わせフォーム -->
    <wrapper>
        <center>
            <h1>お問い合わせフォーム</h1>
            <form method="POST" action="/finish">
                @csrf
                <label class="c_title_lavel">タイトル:</label><br>
                <input class="c_title" type="text" name="title" value="お問い合わせ"><br>
                <!-- バリデーションにはじかれた場合エラーメッセージを表示 -->
                @if ($errors->has('title'))
                <p class="error-message">{{ $errors->first('title') }}</p>
                @endif

                <label class="q_lavel">お問い合わせ内容:</label><br>
                <!-- oldヘルパは直前の内容を表示する -->
                <textarea class="message" name="body">{{ old('body') }}</textarea>
                <!-- バリデーションにはじかれた場合エラーメッセージを表示 -->
                @if ($errors->has('body'))
                <p class="error-message">{{ $errors->first('body') }}</p>
                @endif

                <button type="submit" class="btn btn-success">送信</button>
            </form>
        </center>
    </wrapper>
    <footer class="bg-dark text-center c_fotter">
        <div class="container">
            <p class="my-0 text-white py-3">&copy;Trip report</p>
        </div>
    </footer>
</body>

</html>