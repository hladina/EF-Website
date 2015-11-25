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
        <li>
            Login
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
               Benutzername <input type="text" name="username"><br>
                Passwort <input type="password" name="password"><br>
                <input type="submit" name="login" value="Login"><br>
            </form>
            Registrieren
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
                Benutzername <input type="text" name="username"><br>
                Passwort <input type="password" name="password"><br>
                Emailadresse <input type="email" name="email" ><br>
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
    <p>Diese Seite wurde vom Ergänzungsfach Informatik geschaffen viel Spass bei der Benutzung der Seite</p>
</div>
</body>
</html>
