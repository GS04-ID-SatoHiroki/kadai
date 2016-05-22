<?php
//session_set_cookie_params(1000,'/~kadai/', $secure=true, $httponly=true);
session_start();
include("func.php");

//2. セッションチェック(前ページのSESSION＿IDと現在のsession_idを比較)
sessionCheck(); //func.php

//3. 管理者FLGを表示
$userInfo = loginRollSet();//func.php
$name = $userInfo[0];//func.php
$admin = $userInfo[1];//func.php

//1.GETでidを取得
$id = $_GET['id'];

//2.DB接続など
$pdo = db();

//3.SELECT * FROM gs_user_table WHERE id=***; を取得
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt ->bindValue(':id', $id, PDO::PARAM_INT);
$stmt ->execute();

//4.select.phpと同じようにデータを取得（以下はイチ例）
 while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $name = $result["name"];
    $email = $result["email"];
  }


?>

<?php
//HTML_STARTをインクルード
$title = "POSTデータ登録"; //html_start.phpのtitleタグに表示
include("html_start.php");
?>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="*********.php">
  <div class="jumbotron">
   <fieldset>
    <legend>フリーアンケート</legend>
     <label>名前：<input type="text" name="name" value="<? echo $name ?>"></label><br>
     <label>Email：<input type="text" name="email" value="<? echo $email ?>"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

<?php
//HTML_ENDをインクルード
include("html_end.php");
?>