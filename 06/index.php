<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>ログイン</title>
</head>
<body>
    <h1>ログイン画面</h1>
    <form method="post" action="login.php">
       <table>
       <tr>
           <th>メール</th><td><input type="text" name= "login_email" maxlength="50"></td>
        </tr>
           <th>パスワード</th><td><input type="password" name= "login_password" maxlength="50"></td>
        </table>
        <p><input type="submit" value="ログイン"></p>
    </form>
    
<a href="input_data.php">登録はこちら</a>

</body>
</html>