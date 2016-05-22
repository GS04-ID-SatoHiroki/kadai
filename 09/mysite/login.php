<?php

//error_reporting(1);

//cookieを発行する領域をmysite以下に限定（通常はcookieを発行したサイトのどのページからも参照可）
//secureで安全な接続（SSLなど）以外のcookieの送信を禁止
//httponlyでJavaScriptによるcookie取得を禁止
//session_set_cookie_params(0,'/~mysite/', $secure=true, $httponly=true);

//他人がログインできるサーバの場合にセッションファイルの置き場所を目立たない場所（管理人とapacheにしか読み書きできない場所）に設定
//session_save_path("/***/***/sessions");

session_start();
include("func.php");

if($_POST){

//$_SESSION['email'] = $_POST['login_email'];
//$_SESSION['password'] = $_POST['login_password'];

//if($_SESSION['email'] && $_SESSION['password']){

//$_COOKIE['email']に値が入っていたら、$_POSTに情報を代入する
//if($_COOKIE['email'] != ''){
//    $_POST['login_email'] = $_COOKIE['login_email'];
//    $_POST['login_password'] = $_COOKIE['login_password'];
//    $_POST['save'] = 'on';
//}

//grab values email and password from login form

$login_email = $_POST['login_email'];
$login_password = $_POST['login_password'];

if(!empty($login_email || $login_password)){

//create the query and number of rows returned from the query
$pdo = db();
$stmt = $pdo ->prepare("SELECT * FROM users WHERE email=:login_email AND password=:login_password");
$stmt ->bindValue(':login_email', $login_email);
$stmt ->bindValue(':login_password',$login_password);
$status = $stmt ->execute();
//create condition to check if there is 1 row with that email
if($status != false){
    while($row = $stmt ->fetch()){
        $dbid = $row['id'];
        $dbemail = $row['email'];
        $dbpass = $row['password'];
        $dblast_name = $row['last_name'];
        $dbkanri_flg = $row['kanri_flg'];
    }

//var_dump($dbid);
//var_dump($dbemail);
//var_dump($dbpass);
//var_dump($dblastname);
//var_dump(session_id());die;

//create condition to check if email and password are equal to the returned row
    if($login_email == $dbemail){
        if($login_password == $dbpass){
            //該当レコードがあればSESSIONに値を代入
            if( $dbid != "" ){
              $_SESSION["chk_ssid"]  = session_id();
              $_SESSION["kanri_flg"] = $dbkanri_flg;
              $_SESSION["name"]      = $dblast_name;
            echo "<p>ログイン成功：ようこそ ".$_SESSION["name"]." さん<br>3秒後に自動的にレコード一覧画面に移動します。</P>";
              header("Refresh:3; output_data.php");
            }else{
              //logout処理を経由して前画面へ
              header("Location: logout.php");
            }
            
        }else{
            
            echo "パスワードが間違っています。<br>再度正しい情報をご入力頂くか、以下から登録をお願いします。";
            echo "<p><a href='index.php'>ログインはこちら</a></p>";
            echo "<p><a href='input_data.php'>登録はこちら</a></p>";
        }
    }else{
        
        echo "メールアドレスが間違っています。<br>再度正しい情報をご入力頂くか、以下から登録をお願いします。";
        echo "<p><a href='index.php'>ログインはこちら</a></p>";
        echo "<p><a href='input_data.php'>登録はこちら</a></p>";
        
    }
    
    }else{
        $error = $stmt->errorInfo();
        exit("QueryError:".$error[2]);
        echo "メールアドレスの登録が確認できません。<br>再度正しい情報をご入力頂くか、以下から登録をお願いします。";
        echo "<p><a href='index.php'>ログインはこちら</a></p>";
        echo "<p><a href='input_data.php'>登録はこちら</a></p>";
        
}

}else{
    
    echo "ログイン情報を入力してください。";
    echo "<p><a href='index.php'>ログインはこちら</a></p>";
    echo "<p><a href='input_data.php'>登録はこちら</a></p>";
    
}
}else{
    
    echo "ログインしてください。";
    header("Refresh:3; index.php");
    exit();
    
}
?>


