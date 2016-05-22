<?php
//session_set_cookie_params(1000,'/~mysite/', $secure=true, $httponly=true);
session_start();
include('func.php');
sessionCheck();
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Edit</title>
</head>

<body>
    <h1>レコード詳細</h1>
        <table>
            <tr>
                <th>ID</th>
                <td>
                    <?php echo $_GET['user_id']; ?>
                </td>
            </tr>
            <tr>
                <th>姓</th>
                <td>
                    <?php echo $_GET['lname']; ?>
                </td>
            </tr>
            <tr>
                <th>名</th>
                <td>
                    <?php echo $_GET['fname']; ?>
                </td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    <?php echo $_GET['gender']; ?>
                </td>
            </tr>
            <tr>
            <tr>
                <th>年齢</th>
                <td>
                    <?php echo $_GET['age']; ?>
                </td>
            </tr>
            <tr>
            <tr>
                <th>Email</th>
                <td>
                    <?php echo $_GET['email']; ?>
                </td>
            </tr>
            <tr>
                <th>評価</th>
                <td>
                    <?php echo $_GET['score']; ?>
                </td>
            </tr>
            <tr>
                <th>コメント</th>
                <td>
                    <?php echo $_GET['comment']; ?>
                </td>
            </tr>
        </table>

        <p><a href="output_data.php" </a>レコード一覧に戻る</p>
    </form>

<?php include("navibar.php"); ?>

</body>

</html>