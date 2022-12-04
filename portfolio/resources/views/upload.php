<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録が完了しました</title>
</head>

<body>
    <?php
    //データベース登録
    $prefecture = $_POST["prefecture"];
    if ($prefecture != "undefined") {
        try {
            $mysqli = new mysqli("localhost", "root", "kochiya518", "trip");
            if ($mysqli->connect_error) { // connect_errorはPHP5.3.0以降で有効
                die("connect_error" . $mysqli->connect_error);
            }
            // エスケープ処理
            //$search_query = $mysqli->real_escape_string($search_query);

            $mysqli->set_charset("utf8");
            $stmt = $mysqli->prepare('INSERT INTO `report` (prefecture, city, comment) VALUES (?,?,?)');
            $city = $_POST["city"];
            $comment = $_POST["comment"];
            // executeでクエリを実行
            $stmt->execute(array($prefecture, $city, $comment));

            //画像の保存
            $stmt = $mysqli->prepare('INSERT INTO `images` (img_name, img_type, img_content, img_size, created_at) VALUES (?,?,?,?,now())');
            $name = $_FILES['img']['name'];
            $type = $_FILES['img']['type'];
            $content = file_get_contents($_FILES['img']['tmp_name']);
            $size = $_FILES['img']['size'];
            // executeでクエリを実行
            $stmt->execute(array($name, $type, $content, $size));

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
        echo "※都道府県を選択してください";
    }
    ?>
    <h3><a href="/info.php">トップページに戻る</a></h3>
</body>

</html>