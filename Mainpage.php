<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>KollegiGuide</title>
</head>
<body>
<?php
$username = "root";
$password = "";
$hostname = "localhost";

//connection to the database
$dbhandle = new mysqli($hostname, $username, $password)
or die("Unable to connect to MySQL");
//select a database to work with
$selected = $dbhandle->select_db("EF_Website_Database")
or die("Could not select subject");
// Check connection
$result = $dbhandle->query("SELECT * FROM subject");
//fetch tha data from the database
if($result === FALSE) {
    die($dbhandle->error());
}
$subjects = [];
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $subjects[] = $row["name"];
    }
}
else {
    echo "0 results";
}
?>
    <ul>
        <li>Login
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
               Benutzername <input type="text" name="username"><br>
                Passwort <input type="password" name="password"><br>
                <input type="submit" name="login" value="Login"><br>
            </form>
        </li>
        <li>Registrieren
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
                Benutzername <input type="text" name="username"><br>
                Passwort <input type="password" name="password"><br>
                Emailadresse <input type="email" name="email" ><br>
                Klasse<input type="text" name="class"><br>
                <input type="submit" name="register" value="Registrieren">
            </form>
        </li>
        <li>
            <a href="#">Notenblatt</a>
        </li>
        <li>Forum
            <ul>
                <?php
                foreach($subjects as $subject){
                   echo("
                   <li>
                   <a href='dummyside.php?klasse=$subject'>".$subject."</a>
                   </li>
                   ");
                }
                ?>
            </ul>
        </li>
        <li>
            Zusammenfasseungen
            <ul>
               <?php
               $klassen = ["1. Klasse","2. Klasse","3. Klasse","4. Klasse","5. Klasse","6. Klasse"];
               foreach($klassen as $klasse){
                   echo("
                   <li>
                   <a href='dummyside.php?klasse=$klasse'>".$klasse."</a>
                   </li>
                   ");
               }
               ?>
            </ul>
        </li>
    </ul>
<h1>Willkommen bei KollegiGuide</h1>
<div id="news">
    <h2>Neues vom Kollegi</h2>
    <h3>Lorem ipsum</h3>
    <p>
    </p>
    <p>
    </p>
</div>
<div>
    <h2>Ein anderer Inhalt</h2>
    <p>jashfjasdhfadfaafs</p>
</div>
<div class="impressum">
    KollegiGuide gemacht von EF-Informatik &copy 2015
</div>
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
            }
        }
    }
    else{
        die();
    }
}

else if (isset($_GET["register"])){
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
</body>
</html>
