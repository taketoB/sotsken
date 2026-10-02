<?php
require_once 'db.php';

// post.htmlから送信されてきたデータを変数に格納
$productname = $_POST['productname'];
$price = $_POST['price'];
$stock = $_POST['stock'];

// SQL文を準備
$sql = "INSERT INTO productinfo (productname, price, stock) VALUES (:productname, :price, :stock)";

// プリペアドステートメントを準備
$stmt = $db->prepare($sql);

// パラメータをバインド
$stmt->bindParam(':productname', $productname, PDO::PARAM_STR);
$stmt->bindParam(':price', $price, PDO::PARAM_INT);
$stmt->bindParam(':stock', $stock, PDO::PARAM_INT);

// SQLを実行
$stmt->execute();

// index.phpへリダイレクト
header('Location: index.php');
exit;
?>