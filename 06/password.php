<?php

//avoid error notices, display only warnings:
error_reporting(0);

//check if user submitted form:
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //connect to database:
    include('connection.php');
    
    //Create an array for errors:
    $errors = array();
    
    //check for email address:
    if(empty($_POST['email'])){
        $errors[] = 'メールアドレスが入力されていません。';
    }else{
        $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
    }
    
    //check current password:
    if (empty($_POST['pass'])){
        $errors[] = 'パスワードが入力されていません。';
    }else{
        $p = mysqli_real_escape_string($dbc, trim($_POST['pass']));
    }
    
    //check for a new password and compare it with confirmed password:
    if (!empty($_POST['pass1'])){
        if($_POST['pass1'] != $_POST['pass2']){
            $errors[] = '新しいパスワードが一致していません。';
        }else{
            $np = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
        }
    }else{
        $errors[] = '新しいパスワードが入力されていません。';
    }
    
    //if there is no errors:
    if(empty($errors)){
        //check that the user entered the right email/password combination:
        $q = "SELECT id FROM users WHERE (email='$e' AND password='$p')";
        $r = mysqli_query($dbc, $q);
        $num = mysqli_num_rows($r);
        
        //get user id:
        if($num == 1){
            $row = mysqli_fetch_array($r, MYSQLI_NUM);
            
            //Make the UPDATE query:
            $q = "UPDATE users SET password='$np' WHERE id='$row[0]'";
            $r = mysqli_query($dbc, $q);
            
            //if everything was ok:
            if(mysqli_affected_rows($dbc) == 1){
                //Ok message confirmation:
                echo "パスワードが変更されました。";
            }else{
                echo "パスワードが変更できませんでした。";
            }
            
            //close connection to db:
            mysqli_close($dbc);
        }else{
            echo "メールとパスワードの一致が確認できません。";
        }
    }else{
        echo "次のエラーが発生しています。<br>";
        foreach($errors as $msg){
            echo $msg."<br>";
        }
    }
}else{
    
    echo "ログインしてください。";
    
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>パスワード変更</title>
</head>

<body>
    <h1>パスワード変更</h1>
    <form method="post" action="password.php">
        <table>
            <tr>
                <th>メールアドレス</th>
                <td>
                    <input type="text" name="email" size="20" maxlength="50" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
                </td>
            </tr>
            <tr>
                <th>現在のパスワード</th>
                <td>
                    <input type="password" name="pass" size="10" maxlength="50" value="<?php if(isset($_POST['pass'])){echo $_POST['pass'];} ?>">
                </td>
            </tr>
            <tr>
                <th>新しいパスワード</th>
                <td>
                    <input type="password" name="pass1" size="10" maxlength="50" value="<?php if(isset($_POST['pass1'])){echo $_POST['pass1'];} ?>">
                </td>
            </tr>
            <tr>
                <th>新しいパスワード（確認）</th>
                <td>
                    <input type="password" name="pass2" size="10" maxlength="50" value="<?php if(isset($_POST['pass2'])){echo $_POST['pass2'];} ?>">
                </td>
            </tr>
        </table>
        <div>
            <input type="submit" name="submit" value="変更">
        </div>
    </form>

<?php include("navibar.php"); ?>

</body>

</html>