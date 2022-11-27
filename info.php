<!DOCTYPE html>
<meta charset="utf-8">
<html>

<head>
    <title>旅行記録アプリ</title>
    <script src="js\jquery-3.6.1.min.js"></script>
    <script src="js\jquery.japan-map.js"></script>
    <script src="js\jquery.japan-map.min.js"></script>

    <script>
        $(function() {
            $("#map-container").japanMap({
                onSelect: function(data) {
                    var prefecture = data.code;
                    target = document.getElementById("output");
                    target.innerHTML = data.name;
                }
            });
        });
    </script>
</head>

<body>
    <div id="map-container"></div>
    <script></script>
    <h1 id="output"></h1>

    <form method="POST" action="upimg.php" enctype="multipart/form-data">
        <label>市町村:<input type="text" name="city"></label>

        <input type="file" name="upimg" accept="image/*">
        <input type="submit">

    </form>
</body>

</html>