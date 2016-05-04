<?php

//avoid error notices, display only warnings:
error_reporting(0);

//check if user submitted form:
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //connect to database:
    include('connection.php');
    
    //get input user_id value from form:
    $id_user = mysqli_real_escape_string($dbc, trim($_POST["user_id"]));
    $e_fname = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
    $e_lname = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
    $e_email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $e_comments = mysqli_real_escape_string($dbc, trim($_POST['comments']));
    //edit user where id = $user_id:

    $q = mysqli_query($dbc, "UPDATE users SET first_name='$e_fname', last_name='$e_lname', email='$e_email', comments='$e_comments', update_date=now() WHERE id='$id_user'");
    $r = mysqli_query($dbc, $q);
    
    echo "ユーザー情報の変更に成功しました。";
    
}else{
    
    echo "ログインしてください。";
    
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Edit</title>
</head>

<body>
    <h3>レコード編集</h3>
    <form method="post" action="edit.php">
        <table>
            <tr>
                <th>ID</th>
                <td>
                    <input type="text" name="user_id" value="<?php echo $_GET['user_id']; ?>">
                </td>
            </tr>
            <tr>
                <th>姓</th>
                <td>
                    <input type="text" name="last_name" value="<?php echo $_GET['lname']; ?>">
                </td>
            </tr>
            <tr>
                <th>名</th>
                <td>
                    <input type="text" name="first_name" value="<?php echo $_GET['fname']; ?>">
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <input type="text" name="email" value="<?php echo $_GET['email']; ?>">
                </td>
            <tr>
                <th>コメント</th>
                <td>
                    <input type="text" name="comments" value="<?php echo $_GET['comment']; ?>">
                </td>
            </tr>
        </table>
        <div>
            <input type="submit" name="submit" value="変更">
        </div>
        <p><a href="output_data.php" </a>レコード一覧に戻る</p>
    </form>
</body>

</html>