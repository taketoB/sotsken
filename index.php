<?php
require_once 'db.php'; // データベース接続

$sql = 'SELECT * FROM productinfo'; 
$statement = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品管理システム</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>商品管理システム</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫</th>
        </tr>
        <?php while($row = $statement->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo h($row['id']); ?></td>
                <td><?php echo h($row['productname']); ?></td>
                <td><?php echo h($row['price']); ?></td>
                <td><?php echo h($row['stock']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <button onclick="location.href='post.html'">登録</button>
    <button onclick="location.href='show-all(check).php'">削除</button>
</body>
</html>
