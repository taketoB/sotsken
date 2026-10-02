<?php require_once('db.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>商品管理システム - 削除ページ</title>
  <style>
    table {
      border-collapse: collapse;
    }
    td, th {
      border: solid 1px;
      padding: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
  <h1>商品管理システム - 削除ページ</h1>

  <form action="delete-item.php" method="post">
    <table>
      <tr>
        <th></th> <!-- チェックボックス用のカラム -->
        <th>ID</th>
        <th>商品名</th>
        <th>価格</th>
        <th>在庫</th>
      </tr>

      <?php
        $sql = 'SELECT * FROM productinfo';
        $statement = $db->query($sql);

        while ($row = $statement->fetch()) {
          $id = h($row['id']);
          $productname = h($row['productname']);
          $price = h($row['price']);
          $stock = h($row['stock']);

          echo "<tr>";
          echo "<td><input type='checkbox' name='delete[]' value='{$id}'></td>"; // チェックボックスを追加
          echo "<td>{$id}</td>";
          echo "<td>{$productname}</td>";
          echo "<td>{$price}</td>";
          echo "<td>{$stock}</td>";
          echo "</tr>";
        }
      ?>
    </table>
    <br> <!-- 表の下に１行改行 -->
    <input type="submit" value="削除">
    <input type="reset" value="リセット">
  </form>
  <a href="index.php">戻る</a> <!-- 「戻る」のリンクを配置 -->

</body>
</html>
