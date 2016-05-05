<?php 
//CRUD - Create, Read, Update and DELETE

include ("ChromePhp.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$score = $_POST['score'];
$comments = $_POST['comments'];
$password = $_POST['password'];
    
    if(!empty($first_name) && !empty($last_name) && !empty($email) && !empty($tel) && !empty($gender) && !empty($age) && !empty($score) && !empty($comments) && !empty($password)){
        
        include('connection.php');
        
        mysqli_query($dbc, "INSERT INTO users(first_name,last_name,email,tel,gender,age,score,comments,password,registration_date) VALUES('$first_name','$last_name','$email','$tel','$gender','$age','$score','$comments','$password',now())");
        
        $registered = mysqli_affected_rows($dbc);
        
        echo "登録が完了しました。";
        
    }else{
        
        echo "<p style='color:red'>エラー: すべての項目を入力してください。</p>";
        
    }
}else{
    
    ChromePhp::log('データベースにアクセス中');
    
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>QuestionnaireSurvey</title>
</head>

<body>
    <h1>登録フォーム</h1>
    <div>ただいまの時刻は <?php date_default_timezone_set('Asia/Tokyo'); echo date("Y/m/d H:i:s") ?> です。</div>
    <form method="post" action="input_data.php" data-validate>
        <table>
            <tr>
                <th>姓</th>
                <td class="inputarea">
                    <input type="text" name="last_name" id="last_name" maxlength="50" onchange="register(this)" required>
                </td>
                <td class="check">
                </td>
            </tr>
            <tr>
                <th>名</th>
                <td class="inputarea">
                    <input type="text" name="first_name" id="first_name" maxlength="50" onchange="register(this)" required>
                </td>
                <td class="check">
                </td>
            </tr>
            <tr>
                <th>メール</th>
                <td class="inputarea">
                    <input type="text" name="email" id="email" maxlength="50" onchange="register(this)" required>
                </td>
                <td class="check">
                </td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td class="inputarea">
                    <input type="text" name="tel" id="tel" onchange="register(this)" required>
                </td>
                <td class="check">
                </td>

            </tr>
            <tr>
                <th>性別</th>
                <td class="inputarea">
                    <input type="radio" name="gender" id="gender" value="M" maxlength="1" onchange="register(this)" required>男
                    <input type="radio" name="gender" id="gender" value="F" maxlength="1" onchange="register(this)" required>女
                </td>
                <td class="check">
                </td>

            </tr>
            <tr>
                <th>年齢</th>
                <td class="inputarea">
                    <input type="text" name="age" id="age" maxlength="3" onchange="register(this)" required>
                </td>
                <td class="check">
                </td>

            </tr>
            <tr>
                <th>評価</th>
                <td class="inputarea">
                    <div id="score"></div>
                </td>
                <td class="check">
                </td>

            </tr>
            <tr>
                <th>コメント</th>
                <td class="inputarea">
                    <textarea name="comments" id="comments" rows=5 cols=40 maxlength="200" onchange="register(this)" required></textarea>
                </td>
                <td class="check">
                </td>

            </tr>
            <tr>
                <th>パスワード</th>
                <td class="inputarea">
                    <input type="text" name="password" id="password" maxlength="50" onchange="register(this)" required>
                </td>
                <td class="check">
                </td>

            </tr>
        </table>
        <div><input type="submit" id="submit" disabled></div>
    </form>
    
    <a href="output_data.php">すべての登録レコードを確認</a>
    
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="./js/raty-master/lib/jquery.raty.js"></script>
    
    <script>

        //5段階評価jquery
        $(function raty() {
            $.fn.raty.defaults.path = "./js/raty-master/lib/images";
            $("#score").raty({
                number : 5,
                score : 0,
                hints : ['1', '2', '3', '4', '5'],
            });
            });

        //入力チェック
        function register($this) {
            if( $($this).val() == ""){
                $($this).parent().next().html('<p id="check_error" class="button">未入力</p>');
            }else{
                $($this).parent().next().html('<p id="check_clear" class="button">OK</p>');
            };

//エラー表示配列.ver
//            var x = new Array();
//            x[0] = $("#name").val();
//            x[1] = $("#mail").val();
//            x[2] = $("#tel").val();
//            x[3] = $("#comment").val();
//
//            var h = new Array();
//            h[0] = '<p id="check_error" class="button">未入力</p>';
//            h[1] = '<p id="check_error" class="button">未入力</p>';
//            h[2] = '<p id="check_error" class="button">未入力</p>';
//            h[3] = '<p id="check_error" class="button">未入力</p>';
//
//            var divs = new Array("#c_name", "#c_mail", "#c_tel", "#c_comment");
//
//            for (i in x) {
//                var error = h[i];
//                var div = divs[i];
//                if (x[i] == "") {
//                    $(div).html(error);
//                } else {
//                    $(div).html('<p id="check_clear" class="button">OK</p>');
//                };
//            };

        };
        jQuery(function ($) {
            $('form[data-validate]').on('change', function () {
                $(this).find(':submit').attr('disabled', !this.checkValidity());
            });
        });
    </script>
    
</body>

</html>