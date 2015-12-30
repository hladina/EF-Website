<?php
if (isset($_GET["register"])){
    $username = $_GET["username"];
    $password = $_GET["password"];
    $email = $_GET["email"];
    $class = $_GET["class"];
    $sql = "INSERT INTO user (username ,password, email,class)
    VALUES ('$username', '$password', '$email', '$class')";
    if($dbhandle->query($sql)===true){
        echo "registred";
    }
}
?>