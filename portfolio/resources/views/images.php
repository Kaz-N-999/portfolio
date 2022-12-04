<?php
$mysqli = new mysqli("localhost", "root", "kochiya518", "trip");
if ($mysqli->connect_error) { // connect_errorはPHP5.3.0以降で有効
    die("connect_error" . $mysqli->connect_error);
}
$sql = 'SELECT * FROM images WHERE image_id = :image_id LIMIT 1';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':image_id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$image = $stmt->fetch();

header('Content-type: ' . $image['image_type']);
echo $image['image_content'];
exit();
?>