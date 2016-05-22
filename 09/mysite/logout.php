<?php
//session_set_cookie_params(1000,'/~mysite/', $secure=true, $httponly=true);
session_start();
$_SESSION = array();

if(isset($_COOKIE[session_name()])){
    setcookie(session_name(),'',time()-42000,'/');
}

session_destroy();

echo "ログアウトしました。3秒後に自動的にログイン画面に移動します。";
header("Refresh:3; index.php");
exit();

?>