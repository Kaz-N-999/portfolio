<!DOCTYPE html>
<meta charset="utf-8">
<html>

<head>
    <title>旅行記録アプリ</title>
    <script src="js\jquery-3.6.1.min.js"></script>
    <script src="js\jquery.japan-map.js"></script>
    <script src="js\jquery.japan-map.min.js"></script>

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

        <input type="submit" value="送信">
    </form>
    <button type="button" onclick="funcBtn()">確認</button>
    <script>
        function funcBtn() {
    alert(prefecture);
}
    </script>
</body>

</html>