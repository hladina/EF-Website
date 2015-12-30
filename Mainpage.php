<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>KollegiGuide</title>
</head>
<body>
<?php
include "dbconfig.php";

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
               $klassen = ["1","2","3","4","5","6"];
               foreach($klassen as $klasse){
                   echo("
                   <li>
                   <a href='summaries.php?klasse=$klasse'>".$klasse.". Klasse</a>
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
include "login.php";

include "register.php";


?>
</body>
</html>
