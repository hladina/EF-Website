<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dummyside</title>
</head>
<body>
<?php
include "dbconfig.php";
$result = $dbhandle->query("SELECT * FROM subject");
//fetch tha data from the database
if($result === FALSE) {
    die($dbhandle->error());
}

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo ("id: " . $row["id"]. " - Name: " . $row["name"].  "<br>");
    }
}
else {
    echo "0 results";
}
?>
</body>
</html>
