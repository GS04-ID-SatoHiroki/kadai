<?php

//avoid error notices, display only warnings:
//http://php.net/manual/ja/function.error-reporting.php
error_reporting(0);

//check if user submitted form:
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //connect to database:
    include('connection.php');
    
    //get input user_id value from form:
    $id_user = $_POST["user_id"];
    
    //delete user where id = $id_user:
    $del = $pdo->prepare("DELETE FROM users WHERE id=:id");
    $del -> bindValue(':id',$id_user, PDO::PARAM_INT);
    
    $status = $del -> execute();
    
    //output_data.phpへリダイレクト
    header("location: output_data.php");
    exit;
    
}else{
    
//    ChromePhp::log("未接続");
//    echo "ログインしてください。";
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <h1>レコード削除</h1>
    <form method="post" action="delete.php">
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
                    <input type="text" name="first_name" value="<?php echo $_GET['email']; ?>">
                </td>
            </tr>
        </table>
        <div>
            <input type="submit" name="submit" value="削除">
        </div>
    </form>
        <p><a href="output_data.php" </a>レコード一覧に戻る</p>

<?php include("navibar.php"); ?>

</body>

</html>