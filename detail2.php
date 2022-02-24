<?php
session_start();


require_once('funcs.php');
// loginCheck();

$pdo = db_conn();

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id=:id;');
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

$view = '';

if($status == false){
    sql_error($status);
}else{
    $result = $stmt->fetch();
}




?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ブックマーク</title>
</head>
<body>
</div>
<a href="select2.php">ブックマーク一覧へ</a>
    <div class="search_area">
        <div id="logo2" class="logo"><img src="./images/Google_Books_logo_2015.png" class="logo_image"></div>
        <!-- <input type="text" id="search_text2" class="search_text">
        <button id="search_button2" class="search_button">検索</button>
        <div id="loading2" style="display: none;"><img src="./images/circle.gif" class="loading_icon"></div> -->
    <div id="result2"></div>
</div>

<form method="post" action="update.php">
    <div class="jumbotron" style="text-align: -webkit-center;">
        <fieldset style="width:30%">
            <legend><a href=<?= $result['bookurl']?> target="_blank">サイトへ</a></legend>
            <label>書籍名：<input type="text" name="name" value=<?= $result['bookname'] ?>></label><br>
            <label>URL：<input type="text" name="url" value=<?= $result['bookurl']?>></label><br>
            <label><textArea name="naiyou" rows="4" cols="40"><?= $result['bookcomment']?></textArea></label><br>

            <input type='hidden' name="id" value="<?=$result["id"]?>">

            <!-- <input type="submit" value="更新"> -->
        </fieldset>
    </div>
</form>

<!-- 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<script>

$("#search_button2").on("click", function() {
    
    let searchText2 = $("#search_text2").val();
    console.log(searchText2)
    $("#loading2").css("display","block");
    $.getJSON(
        `https://www.googleapis.com/books/v1/volumes?q=${searchText2}`,
        function(data){
        console.log(data);
        // let title = "";
        // let link = "";
        let str2 = "";
        for (let i = 0; i < data.items.length; i++) {
            // let item = data.items[i];
            // title += item.volumeInfo.title;
            // link += item.volumeInfo.canonicalVolumeLink;
            
            // console.log(title)
            // str2 += `<a href="${data.items[i].volumeInfo.canonicalVolumeLink}" target="_blank">${data.items[i].volumeInfo.title}</a><br>`
            str2 += `<form method="post" action="insert.php">`
            str2 += `<div class="jumbotron">`
            str2 += `<fieldset>`
            str2 += `<legend><a href="${data.items[i].volumeInfo.canonicalVolumeLink}" target="_blank">サイトへ</a></legend>`
            str2 += `<label>書籍名：<input type="text" name="name" value=$<?= $result['bookname'] ?>></label><br>`
            str2 += `<label>URL：<input type="text" name="url" value=<?= $result['bookurl']?>></label><br>`
            str2 += `<label><textArea name="naiyou" rows="4" cols="40"><?= $result['bookcomment']?></textArea></label><br>`
            str2 += `<input type="submit" value="保存">`
            str2 += `</fieldset>`
            str2 += `</div>`
            str2 += `</form>`


            console.log(data.items[i].volumeInfo.title);
            console.log(data.items[i].volumeInfo.canonicalVolumeLink);
        };
            $("#loading2").css("display","none");
            $("#result2").html(str2);
            // $("#result2").html(link);
        }
        

        
    );
});


</script> -->



</body>
</html>