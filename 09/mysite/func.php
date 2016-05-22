<?php
//DB接続
function db(){
  try {
    return new PDO('mysql:dbname=myfirstdatabase;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }
}

//セッションチェック用関数
function sessionCheck(){
  if( !isset($_SESSION["chk_ssid"]) || ($_SESSION["chk_ssid"] != session_id()) ){
    echo "LOGIN ERROR<br>3秒後に自動的にログイン画面に移動します。";
    //処理後、3秒後に自動的にindex.phpへリダイレクト
    header("Refresh:3; url=index.php");
    exit();
    //PHPのルール上、headerの前にecho（文字）がある場合にはエラーとなるはずだが、問題なく動くのはなぜ、、？
  }else{
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
  }
}

//ログイン時のセッションへの情報セット
function loginRollSet(){
  if( $_SESSION["kanri_flg"]==1 ) {
    $name   =  "名前：" . $_SESSION["name"];
    $admin  =  "権限：管理者";
    $admin .=  '<a href="#">／管理者メニュー</a>';
  }else if( $_SESSION["kanri_flg"]==0 ){
    $name   =  "名前：" . $_SESSION["name"];
    $admin  =  "権限：一般";
  }
  return [$name,$admin];
}

//セッション回数のカウント
function sessionCount(){
    if(isset($_SESSION['cnt'])){
        echo "あなたは".$_SESSION['cnt']."回目のアクセスです。";
    }else{
        $_SESSION['cnt'] = 1;
        echo "あなたは初めてのアクセスです（あるいはクッキーが保存されていません）。";
    }
    $_SESSION['cnt']++;
}

//HTML XSS対策
function htmlEnc($value) {
    return htmlspecialchars($value,ENT_QUOTES);
}
?>
