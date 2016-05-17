<?php

//include ("ChromePhp.php");

//avoid error notices, display only warnings:
//http://php.net/manual/ja/function.error-reporting.php
error_reporting(0);

//check if user submitted form:
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //connect to database:
    include('connection.php');
//    ChromePhp::log("接続成功");
    
    //get input user_id value from form:
    $id_user = $_POST["user_id"];
    $e_fname = $_POST['first_name'];
    $e_lname = $_POST['last_name'];
    $e_email = $_POST['email'];
    $e_score = $_POST['score'];
    $e_comments = $_POST['comments'];

    //edit user where id = $user_id:
    $update = $pdo->prepare("UPDATE users SET first_name=:e_fname, last_name=:e_lname, email=:e_email, score=:e_score, comments=:e_comments, update_date=sysdate() WHERE id=:id");
    
    $update -> bindValue(':id',$id_user, PDO::PARAM_INT);
    $update -> bindValue(':e_fname',$e_fname, PDO::PARAM_STR);
    $update -> bindValue(':e_lname',$e_lname, PDO::PARAM_STR);
    $update -> bindValue(':e_email',$e_email, PDO::PARAM_STR);
    $update -> bindValue(':e_score',$e_score, PDO::PARAM_INT);
    $update -> bindValue(':e_comments',$e_comments, PDO::PARAM_STR);
    
    $status = $update ->execute();
    
    //output_data.phpへリダイレクト
    header("location: output_data.php");
    exit;
    
}else{
    
//    ChromePhp::log("未接続");
//    echo "ログインしてください。";
    
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
    <h1>レコード編集</h1>
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
            </tr>
            <tr>
                <th>評価</th>
                <td>
                    <input type="text" name="score" value="<?php echo $_GET['score']; ?>">
                </td>
            </tr>
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

<?php include("navibar.php"); ?>

</body>

</html>