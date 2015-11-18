
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dummyside</title>
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
$result = $dbhandle->query("SELECT * FROM subject");
//fetch tha data from the database
if($result === FALSE) {
    die($dbhandle->error());
}

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"].  "<br>";
    }
} else {
    echo "0 results";
}
?>

</body>
</html>

