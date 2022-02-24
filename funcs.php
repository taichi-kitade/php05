<?php
//データベース接続
function db_conn()
{
    try{
        $db_name  = 'bm_db';
        $db_id    = 'root';
        $db_pw    = 'root';
        $db_host  = 'localhost';
        $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host,$db_id,$db_pw);
        return $pdo;
    }catch(PDOException $e){
        exit('DB Conenction Error:'.$e->getMessage());
    }
}

//エラー
function sql_error($stmt)
{
    $error = $stmt->errorInfo();
    exit('SQLERROR:' . print_r($error, true));
}

//リダイレクト
function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}


// ログインチェク処理 loginCheck()

function loginCheck(){
    if($_SESSION['chk_ssid'] != session_id()){
        exit('ログインエラーです！不正なアクセスです！');
    }else{
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
    }
    }
    



?>