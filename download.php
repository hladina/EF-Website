<html>
<head>
    <title>Download File From MySQL</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
$sql = "SELECT id, name FROM summary";
$result = $dbhandle->query($sql);




if($result === FALSE) {
    echo "Error";
    die($dbhandle->error());
}

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $name = $row["name"];
        echo "<a href='download.php?id=$id'>" . $name. "</a> <br>" ;
    }
}
else {
    echo "0 results";
}

?>
</body>
</html>