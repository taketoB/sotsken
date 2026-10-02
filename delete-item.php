<?php
require_once 'db.php'; // データベース接続

// $_POSTから削除すべきIDの配列を取得
$idsToDelete = $_POST['delete'];

// 各IDに対して削除を行う
foreach ($idsToDelete as $id) {
    $sql = "DELETE FROM productinfo WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}

// 削除処理が完了したらindex.phpにリダイレクト
header("Location: index.php");
exit;
?>