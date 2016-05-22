<?php
session_set_cookie_params(1000,'/~mysite/', $secure=true, $httponly=true);
session_start();
include('func.php');
sessionCount();
?>

<?php $title="ログイン"; include('html_start.php'); ?>
    <h1>ログイン</h1>
    <form method="post" action="login.php">
       <table>
       <tr>
           <th>メール</th><td><input type="text" name= "login_email" maxlength="50"></td>
        </tr>
           <th>パスワード</th><td><input type="password" name= "login_password" maxlength="50"></td>
        </table>
        <p><input type="submit" value="ログイン"></p>
    </form>
    
<a href="input_data.php">ユーザー登録はこちら</a>
<?php include('html_end.php');?>