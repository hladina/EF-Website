<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dummyside</title>
</head>
<body>
<?php
include "dbconfig.php";

    if(isset($_SESSION["user"])) {
        echo "<a href='addPost.php'>Neuer Eintrag hinzufügen</a>";
    }
?>
</body>
</html>
