<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zusammenfassungen <?php echo $_GET['klasse'];?></title>
</head>
<body>
<?php
$username = "root";
$password = "";
$hostname = "localhost";

//connection to the database
$dbhandle = new mysqli($hostname, $username, $password)
or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";
//select a database to work with
$selected = $dbhandle->select_db("EF_Website_Database")
or die("Could not select subject");
// Check connection
//execute the SQL query and return records
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
            /*foreach($subjects as $subject){
                echo("
                 <li>
                 <a href='dummyside.php?klasse=$subject'>".$subject."</a>
                 </li>
                 ");
            }*/
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
                   <a href='summaries.php?klasse=$klasse'>".$klasse."</a>
                   </li>
                   ");
            }
            ?>
        </ul>
    </li>
    <li>Zusammenfassung Hinzufügen
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
            Titel <input type="text" name="title"><br>
            File <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            <input name="userfile" type="file" id="userfile"> <br>
            <input type="submit" name="submit" value="Hochladen">
        </form>
    </li>
</ul>
<?php

if(isset($_GET["submit"])&& $_FILES['userfile']['size'] > 0){
    echo "Passed 1. if";
    $fileName = $_FILES['userfile']['name'];
    $tmpName  = $_FILES['userfile']['tmp_name'];
    $fileSize = $_FILES['userfile']['size'];
    $fileType = $_FILES['userfile']['type'];
    $fp      = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    $content = addslashes($content);
    fclose($fp);
    include 'library/config.php';
    include 'library/opendb.php';
    if(!get_magic_quotes_gpc())
    {
        $fileName = addslashes($fileName);
    }

    $query = "INSERT INTO upload (name, size, type, content ) ".
        "VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

    mysql_query($query) or die('Error, query failed');
    include 'library/closedb.php';

    echo "<br>File $fileName uploaded<br>";
}
?>
</body>
</html>
