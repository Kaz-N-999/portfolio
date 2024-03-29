<html>

<head>
    <title>履歴確認</title>
    <meta charset="utf-8" />
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
                    <li class="nav-item_list">
                        <a class="nav-link" aria-current="page" href="/info">登録画面</a>
                    </li>
                    <li class="nav-item_list">
                        <a class="nav-link" href="/map">Google MAP</a>
                    </li>
                    <li class="nav-item_list">
                        <a class="nav-link active" href="/list">履歴閲覧</a>
                    </li>
                    <li class="nav-item_list">
                        <a class="nav-link" href="/contact">CONTACT</a>
                    </li>
                    <li class="nav-item_list">
                        <form method="post" name='logout' action="logout">
                            @csrf
                            <input type="hidden">
                            <a href="javascript:logout.submit()" class="nav-link">ログアウト</a>
                        </form>
                    </li>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <center>
            <table border="3" cellspacing="0" cellpadding="8" width="100%">
                <tbody>
                    <tr>
                        <th>写真</th>
                        <th>日付</th>
                        <th>都道府県</th>
                        <th>場所の詳細</th>
                        <th>コメント</th>
                        <th>削除</th>
                    </tr>

                    @foreach ($items as $item)
                    <tr>
                        <td><img src="{{ asset($item->path) }}" width="250px" height="250px"></td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->prefecture}}</td>
                        <td>{{$item->city}}</td>
                        <td>{{$item->comment}}</td>
                        <td>
                            <button type="submit" class="btn btn-danger">編集</button>
                            <form action={{ route('destroy',['id'=> $item->id]), }} method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- $items->links() -->
            <div class="push"></div>
        </center>
    </div>

    <footer class="l_fotter bg-dark text-center">
        <div class="container">
            <p class="my-0 text-white py-3">&copy;Trip report</p>
        </div>
    </footer>
</body>

</html>