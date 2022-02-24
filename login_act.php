<?php


session_start();

$lid = $_POST['lid'];
$lpw = $_POST['lpw'];


require_once('funcs.php');
$pdo = db_conn();


$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE lid = :lid AND lpw  = :lpw');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();


if($status === false){
    sql_error($stmt);
}


$val = $stmt->fetch();

if( $val['id'] != '' && $val['kanri_flg'] == '1'){
    $_SESSION['chk_ssid'] = session_id();
    $_SESSION['kanri_flg'] = $val['kanri_flg'];
    $_SESSION['name'] = $val['name'];

    header('Location: select.php');

}elseif( $val['id'] != '' && $val['kanri_flg'] == '0'){
    $_SESSION['chk_ssid'] = session_id();
    $_SESSION['kanri_flg'] = $val['kanri_flg'];
    $_SESSION['name'] = $val['name'];

    header('Location: select2.php');

}else{
    header('Location: login.php');
}

exit();
