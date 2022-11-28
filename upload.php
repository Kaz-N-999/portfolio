<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //データベース登録
    $raw = file_get_contents('php://input'); // POSTされた生のデータを受け取る
    $prefecture = json_decode($raw); // json形式をphp変数に変換
    if ($prefecture != null) {
        try {
            $mysqli = new mysqli("localhost", "root", "kochiya518", "trip");
            if ($mysqli->connect_error) { // connect_errorはPHP5.3.0以降で有効
                die("connect_error" . $mysqli->connect_error);
            }
            // エスケープ処理
            $search_query = $mysqli->real_escape_string($search_query);

            $mysqli->set_charset("utf8");
            $stmt = $mysqli->prepare('INSERT INTO `report` (prefecture, city, img, comment) VALUES (?,?,?,?)');
            $prefecture = $_POST["prefecture"];
            $city = $_POST["city"];
            $img = $_POST["img"];
            $comment = $_POST["comment"];
            $stmt->bind_param("ssss", $prefecture, $city, $img, $comment);
            // executeでクエリを実行
            $stmt->execute();
    ?>
            <tr>
                <td><?php echo "$prefecture"; ?></td>
                <td><?php echo "$city"; ?></td>
                <td><?php echo "$comment"; ?></td>
            </tr>
            <?php echo "で登録しました。"; ?>
    <?php
            $stmt->close();
            $mysqli->close();
        } catch (PDOException $e) {
            exit('データベースに接続できませんでした。' . $e->getMessage());
            print($e->getTraceAsString());
        }
    } else {
        echo "※都道府県を選択してください"($prefecture);
    }
    ?>
</body>

</html>