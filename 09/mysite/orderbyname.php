<?php
//session_set_cookie_params(1000,'/~mysite/', $secure=true, $httponly=true);
session_start();
include("func.php");
sessionCheck();

$name = loginRollset()[0];
$admin = loginRollset()[1];

//Define query:
$pdo = db();
$stmt = $pdo ->prepare("SELECT last_name, first_name,gender,age, email, score, comments, DATE_FORMAT(registration_date, '%M %d,%Y %T') AS dr, DATE_FORMAT(update_date, '%M %d,%Y %T') AS dr1, id FROM users ORDER BY update_date ASC");

//query select all fields from table users:
$status = $stmt ->execute();

//Count the number of returned rows:
$num = $stmt ->rowCount();

//If any rows returned, display records:
//create table:
$table = "<table width='80%'>
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
if($num > 0 ){
    
    //Inform how many users are registration:
    $nums = "現在<b> ".$num." </b>人の登録があります。";
    
    //use while loop to create an associative array with values registration_date, lastname,firstaname
    while($row = $stmt ->fetch(PDO::FETCH_ASSOC)){
    $table .="
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
    
    $table .= "</table>";
    //create order by name:
    $order = "<a href='output_data.php'><b>登録日順に並び替える</b></a>";
    
}else{
    
    $nums = "現在登録がありません。";
    include("navibar.php");
    
}

$pdo = null;

?>

<?php $title = "登録データ一覧"; include("html_start.php") ;?>
    <p><? echo $name."／".$admin; ?></p>
    <p><? include("navibar.php"); ?></p>
    <p><? echo $nums; ?></p>
    <img src="result_graph_pie.php">
    <img src="result_graph_pie_age.php">
    <img src="result_graph_bar.php">
    <p><? echo $order; ?></p>
    <div><? echo $table; ?></div>
<?php include("html_end.php"); ?>