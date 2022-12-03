<!DOCTYPE html>
<meta charset="utf-8">
<html>

<head>
    <title>旅行記録アプリ</title>
    <script src="js\jquery-3.6.1.min.js"></script>
    <script src="js\jquery.japan-map.js"></script>
    <script src="js\jquery.japan-map.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script>
        var prefecture
        $(function() {
            $("#map-container").japanMap({
                onSelect: function(data) {
                    prefecture = data.name;
                    target = document.getElementById("output");
                    target.innerHTML = data.name;
                }
            });
        });
    </script>
</head>

<body>
    <div id="map-container"></div>
    <h1 id="output"></h1>

    <form name="myform" method="POST" action="upload.php" enctype="multipart/form-data">
        <label>市町村:<input type="text" name="city" required></label><br>
        <label>コメント:<input type="text" class="txt" name="comment" required></label>

        <input type="file" name="img" accept="image/*">

        <input type="submit" value="送信" onclick="funcBtn()">
    </form>
    <script>
        function funcBtn() {
    // エレメントを作成
    var ele = document.createElement('input');
    // データを設定
    ele.setAttribute('type', 'hidden');
    ele.setAttribute('name', 'prefecture');
    ele.setAttribute('value', prefecture);
    // 要素を追加
    document.myform.appendChild(ele);
}
    </script>
</body>

</html>