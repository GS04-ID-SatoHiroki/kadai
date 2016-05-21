<?php

if(!isset($_SESSION['name'])){
    
    echo "not a session";
    
}else{
    
echo "<b>".$_SESSION['name']."<b/>'s session<br /><a href='logout.php'>Logout</a><hr/>";
    
}

?>