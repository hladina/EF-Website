<?php
if(isset($_GET["login"])){
    $inputUsername = $_GET["username"];
    $userResult = $dbhandle->query("select * from user where username = '$inputUsername'");
    if($userResult === FALSE) {
        die($dbhandle->error());
    }
    if ($userResult->num_rows > 0) {
        while($row = $userResult->fetch_assoc() ){
            if($inputUsername == $row["password"]){
                echo "Eingeloggt";
                $_SESSION["user"] = $row;
            }
        }
    }
    else{
        die();
    }
}
?>