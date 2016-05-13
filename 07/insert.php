<?php
  //1. POSTデータ取得（）

  //2. DB接続します
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

  //３．データ登録SQL作成
  $stmt = $pdo->prepare("INSERT INTO gs_an_table (id, name, email, comment, indate )VALUES(NULL, :name, :email, :comment, sysdate())");
  $stmt->bindValue(':name', $name);
  $stmt->bindValue(':email', $email);
  $stmt->bindValue(':comment', $comment);
  $status = $stmt->execute();

  //４．データ登録処理後
  if($status==false){
    //Errorの場合$status=falseとなり、エラー表示
    echo "SQLエラー";
    exit;
    
  }else{
    //５．index.phpへリダイレクト
    header("location: index.php");
    exit;

  }
?>
