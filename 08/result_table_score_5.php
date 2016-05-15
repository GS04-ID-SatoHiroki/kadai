<?php

//include connection script to database:
include ("connection.php");

//Define query:
$q = "SELECT last_name, first_name,gender,age, score, comments, id FROM users WHERE score = 5 ORDER BY registration_date ASC";

//query select all fields from table users:
$r = mysqli_query($dbc, $q);

//Count the number of returned rows:
$num = mysqli_num_rows($r);

//If any rows returned, display records:
if($num > 0 ){
    
    //navibar
    include("navibar.php");
    
    //Inform how many users are registration:
    echo "<p>".$num."人の登録があります。</p>";
    
    //create table:
    echo "<table width='80%'>
    <tr>
        <th align='center'>ID</th>
        <th align='center'>名前</th>
        <th align='center'>性別</th>
        <th align='center'>年齢</th>
        <th align='center'>評価</th>
        <th align='center'>コメント</th>
    </tr>";
    
    //use while loop to create an associative array with values registration_date, lastname,firstaname
    while($row = mysqli_fetch_array($r)){
    
    echo "
    <tr>
    <td align='center'>".$row['id']."</td>
    <td align='center'>".$row['last_name'].",".$row['first_name']."</td>
    <td align='center'>".$row['gender']."</td>
    <td align='center'>".$row['age']."</td>
    <td align='center'>".$row['score']."</td>
    <td align='center'>".$row['comments']."</td>
    </tr>
    ";
    };
    
}else{
    
    echo "現在登録がありません。";
    include("navibar.php");
    
}

mysqli_close($dbc);

?>

<link rel="stylesheet" href="style.css">