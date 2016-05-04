<?php

//include connection script to database:
include("connection.php");

//Define query:
$q = "SELECT last_name, first_name, email, comments, DATE_FORMAT(registration_date, '%M %d,%Y %T') AS dr, DATE_FORMAT(update_date, '%M %d,%Y %T') AS dr1, id FROM users ORDER BY update_date DESC";

//query select all fields from table users:
$r = mysqli_query($dbc, $q);

//Count the number of returned rows:
$num = mysqli_num_rows($r);

//If any rows returned, display records:
if($num > 0 ){
    
    //create order by ID:
    echo "<p><a href='output_data.php'><b>ID順に戻る</b></a></p>";
    
    //Inform how many users are registration:
    echo "<p>".$num."人の登録があります。</p>";
    
    //create table:
    echo "<table width='75%'>
    <tr>
        <th align='left'>編集</th>
        <th align='left'>削除</th>
        <th align='left'>ID</th>
        <th align='left'>名前</th>
        <th align='left'>メールアドレス</th>
        <th align='left'>コメント</th>
        <th align='left'>新規登録日</th>
        <th align='left'>更新日</th>
    </tr>";
    
    //use while loop to create an associative array with values registration_date, lastname,firstaname
    while($row = mysqli_fetch_array($r)){
    
    echo "<tr>
    <td align='left'><a href='edit.php?user_id=".$row['id']."&fname=".$row['first_name']."&lname=".$row['last_name']."&email=".$row['email']."&comment=".$row['comments']."'>編集</a></td>
    <td align='left'><a href='delete.php?user_id=".$row['id']."&fname=".$row['first_name']."&lname=".$row['last_name']."&email=".$row['email']."'>削除</a></td>
    <td align='left'>".$row['id']."</td>
    <td align='left'>".$row['last_name'].",".$row['first_name']."</td>
    <td align='left'>".$row['email']."</td>
    <td align='left'>".$row['comments']."</td>
    <td align='left'>".$row['dr']."</td>
    <td align='left'>".$row['dr1']."</td>
    </tr>";

}
    
}else{
    
    echo "現在登録がありません。";
    
}

mysqli_close($dbc);

?>

    <!--
<?php
function htmlEnc($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

$name = $_POST["name"];
$mail = $_POST["mail"];
$tel = $_POST["tel"];
$comment = $_POST["comments"];

echo $name.' '.$mail.' '.$tel.' '.$comment;

if($name == ""){
    $name = "未入力";
}

?>-->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Output</title>
</head>
<body>
    <div><a href="input_data.php">フォーム画面に戻る</a></div>

<?php include("navibar.php"); ?>

</body>
</html>