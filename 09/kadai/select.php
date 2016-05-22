<?php
/************************************************************
 *  ログイン認証OKの場合表示
 ************************************************************/
//1. SESSION開始
//session_set_cookie_params(1000,'/~kadai/', $secure=true, $httponly=true);
session_start();
include("func.php");

//2. セッションチェック(前ページのSESSION＿IDと現在のsession_idを比較)
sessionCheck(); //func.php

//3. 管理者FLGを表示
$name = loginRollSet()[0];//func.php
$admin = loginRollSet()[1];//func.php

//1.  DB接続します
$pdo = db();//func.php

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３データ表示
$view="<table><tr><td>ID</td><td>名前</td><td>email</td></tr>";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC) ){
    //管理FLGで表示を切り分けたりしてみましょう！！！（追加してください！）
    $view .= '<tr><td><a href="detail.php?id='.$result["id"].'">'.$result["id"].'</a></td><td>'.$result["name"].'</td><td>'.$result["email"].'</td></tr>';
    }
  $view .= '</table>';
}
?>

<?php
//HTML_STARTをインクルード
$title = "アンケートフォーム"; //html_start.phpのtitleタグに表示
include("html_start.php");
?>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="index.php">データ一覧</a>
        <a class="navbar-brand" href="logout.php">ログアウト</a>
        <p>
            <?=$name?>
        </p>
        <p>
            <?=$admin?>
            </p>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron">
    <?=$view?>
    </table>
    </div>
  </div>
</div>
<!-- Main[End] -->

<?php
//HTML_ENDをインクルード
include("html_end.php");
?>