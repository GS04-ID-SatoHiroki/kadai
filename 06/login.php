<?php

error_reporting(1);

include("connection.php");

//grab values email and password from login form

$login_email = mysqli_real_escape_string($dbc, trim($_POST['login_email']));
$login_password = mysqli_real_escape_string($dbc, trim($_POST['login_password']));

if(!empty($login_email || $login_password)){

//create the query and number of rows returned from the query

$query = mysqli_query($dbc, "SELECT * FROM users WHERE email='".$login_email."'");
$numrows = mysqli_num_rows($query);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

//create condition to check if there is 1 row with that email

if($numrows != 0){
    
//grab the email and password from row returned before
    
    while($row = mysqli_fetch_array($query)){
        
        $dbemail = $row['email'];
        $dbpass = $row['password'];
        $dbfirstname = $row['first_name'];
        
    }

//create condition to check if email and password are equal to the returned row
          
    if($login_email == $dbemail){
        if($login_password == $dbpass){
            
            echo "<p>ようこそ ".$dbfirstname." さん</P>";
            include("navibar.php");
            
        }else{
            
            echo "パスワードが間違っています。<br>再度正しい情報をご入力頂くか、以下から登録をお願いします。";
            echo "<p><a href='index.php'>ログインはこちら</a></p>";
            echo "<p><a href='input_data.php'>登録はこちら</a></p>";
        }
    }else{
        
        echo "メールアドレスが間違っています。<br>再度正しい情報をご入力頂くか、以下から登録をお願いします。";
        echo "<p><a href='index.php'>ログインはこちら</a></p>";
        echo "<p><a href='input_data.php'>登録はこちら</a></p>";
        
    }
    
    }else{
        
        echo "メールアドレスの登録が確認できません。<br>再度正しい情報をご入力頂くか、以下から登録をお願いします。";
        echo "<p><a href='index.php'>ログインはこちら</a></p>";
        echo "<p><a href='input_data.php'>登録はこちら</a></p>";
        
}

}else{
    
    echo "ログイン情報を入力してください。";
    echo "<p><a href='index.php'>ログインはこちら</a></p>";
    echo "<p><a href='input_data.php'>登録はこちら</a></p>";
    
}
}else{
    
    echo "ログイン情報を入力してください。";
    echo "<p><a href='index.php'>ログインはこちら</a></p>";
    echo "<p><a href='input_data.php'>登録はこちら</a></p>";
    
}

?>


