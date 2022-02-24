<?php
session_start();


$id   = $_GET['id'];




require_once('funcs.php');
loginCheck();


$pdo = db_conn();



$stmt = $pdo->prepare('DELETE FROM gs_bm_table WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行



if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}

?>
