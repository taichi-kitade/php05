<?php

$name    = $_POST['name'];
$url     = $_POST['url'];
$comment = $_POST['naiyou'];
$id      = $_POST['id'];



require_once('funcs.php');
$pdo = db_conn();



$stmt = $pdo->prepare("UPDATE gs_bm_table SET bookname=:bookname, bookurl=:bookurl, bookcomment=:bookcomment, indate=sysdate() WHERE id=:id");

$stmt->bindValue(':bookname', $name, PDO::PARAM_STR);
$stmt->bindValue(':bookurl', $url, PDO::PARAM_STR);
$stmt->bindValue(':bookcomment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); 



if ($status == false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}

?>

