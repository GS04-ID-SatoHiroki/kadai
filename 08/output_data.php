<?php

//include connection script to database:
include ("connection.php");

//Define query:
$stmt = $pdo->prepare("SELECT last_name, first_name,gender,age, email, score, comments, DATE_FORMAT(registration_date, '%M %d,%Y %T') AS dr, DATE_FORMAT(update_date, '%M %d,%Y %T') AS dr1, id FROM users ORDER BY registration_date ASC");

//query select all fields from table users:
$status = $stmt->execute();

//Count the number of returned rows:
$num = $stmt->rowCount();

//If any rows returned, display records:
if($num > 0 ){
    
    //navibar
    include("navibar.php");
    
    //Inform how many users are registration:
    echo "<p>".$num."人の登録があります。</p>";
    
    //create table:
    echo "<table width='80%'>
    <tr>
        <th align='center'>編集</th>
        <th align='center'>削除</th>
        <th align='center'>ID</th>
        <th align='center'>名前</th>
        <th align='center'>性別</th>
        <th align='center'>年齢</th>
        <th align='center'>メールアドレス</th>
        <th align='center'>評価</th>
        <th align='center'>コメント</th>
        <th align='center'>登録日</th>
        <th align='center'>更新日</th>
    </tr>";
    
    //use while loop to create an associative array with values registration_date, lastname,firstaname
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    
    echo "
    <tr>
    <td align='center'><a href='edit.php?user_id=".$row['id']."&fname=".$row['first_name']."&lname=".$row['last_name']."&email=".$row['email']."&score=".$row['score']."&comment=".$row['comments']."'>編集</a></td>
    <td align='center'><a href='delete.php?user_id=".$row['id']."&fname=".$row['first_name']."&lname=".$row['last_name']."&email=".$row['email']."'>削除</a></td>
    <td align='center'><a href='detail.php?user_id=".$row['id']."&fname=".$row['first_name']."&lname=".$row['last_name']."&gender=".$row['gender']."&age=".$row['age']."&email=".$row['email']."&score=".$row['score']."&comment=".$row['comments']."'>".$row['id']."</a></td>
    <td align='center'>".$row['last_name'].",".$row['first_name']."</td>
    <td align='center'>".$row['gender']."</td>
    <td align='center'>".$row['age']."</td>
    <td align='center'>".$row['email']."</td>
    <td align='center'>".$row['score']."</td>
    <td align='center'>".$row['comments']."</td>
    <td align='center'>".$row['dr']."</td>
    <td align='center'>".$row['dr1']."</td>
    </tr>
    ";
    };
    
    //create order by name:
    echo "<p><a href='orderbyname.php'><b>更新日順に並び替える</b></a></p>";
    
}else{
    
    echo "現在登録がありません。";
    include("navibar.php");
    
}

$pdo = null;

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Output</title>
</head>
<body>
    <img src="result_graph_pie.php">
    <img src="result_graph_pie_age.php">
    <img src="result_graph_bar.php">
</body>
</html>