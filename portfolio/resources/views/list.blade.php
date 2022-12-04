<html>

<head>
    <title>ログ表示</title>
    <meta charset="utf-8" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <center>
        <h3><a href="../info.php">トップページに戻る</a></h3>
        <h4>ログ表示</h4>

        <table border="3" cellspacing="0" cellpadding="8" width="90%">
            <tbody>
                <tr>
                    <th>写真</th>
                    <th>日付</th>
                    <th>都道府県</th>
                    <th>市町村</th>
                    <th>コメント</th>
                </tr>

                @foreach ($items as $item)
                <tr>

                    <td>{{$item->prefecture}}</td>
                    <td>{{$item->city}}</td>
                    <td>{{$item->comment}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </center>
</body>

</html>