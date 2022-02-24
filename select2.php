<?php
session_start();


require_once('funcs.php');
// loginCheck();

$pdo = db_conn();


//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){

    $view .= '<p>';
    $view .= '<a href='.$result["bookurl"].'>';
    $view .= $result["bookname"];
    $view .= '</a>';
    

    $view .= '<a href="detail2.php?id=' . $result['id'] . '">';
    $view .= '[詳細]';
    $view .= '</a>';

    // $view .= '<a href="delete.php?id=' . $result['id'] . '">';
    // $view .= '[削除]';
    // $view .= '</a>';

    $view .= '</p>';
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ブックマーク表示</title>
<link rel="stylesheet" href="css/style.css">
<style>div{padding: 10px;font-size:20px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav>
    <div>
      <div>
      <a href="index.php">本検索へ戻る</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<h1>ブックマーク一覧</h1>
<div>
    
    <div><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>
