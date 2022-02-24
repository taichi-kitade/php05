
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
<header>
    <a href="login.php">ログイン</a>
    <p><a href="select2.php">本の登録一覧へ</a></p>
    
    <!-- <a href="logout.php">ログアウト</a> -->
</header>

</div>
    <div class="search_area">
        <div id="logo2" class="logo"><img src="./images/Google_Books_logo_2015.png" class="logo_image"></div>
        <input type="text" id="search_text2" class="search_text">
        <button id="search_button2" class="search_button">検索</button>
        <div id="loading2" style="display: none;"><img src="./images/circle.gif" class="loading_icon"></div>
    <div id="result2"></div>
</div>
<!-- <a href="select.php">ブックマーク一覧へ</a> -->


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
            str2 += `<label>書籍名：<input type="text" name="name" value=${data.items[i].volumeInfo.title}></label><br>`
            str2 += `<label>URL：<input type="text" name="url" value=${data.items[i].volumeInfo.canonicalVolumeLink}></label><br>`
            str2 += `<label><textArea name="naiyou" rows="4" cols="40"></textArea></label><br>`
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


</script>



</body>
</html>