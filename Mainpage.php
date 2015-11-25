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
?>

    <ul>
        <li>
            <a href="#">Notenblatt</a>
        </li>
        <li>Forum
            <ul>
                <li>
                    <a>Naturwissenschaften</a>
                </li>
                <li>
                    <a>Sprachen</a>
                </li>
                <li>
                    <a></a>
                </li>
            </ul>
        </li>
    </ul>
</body>
</html>
