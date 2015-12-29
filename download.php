<?php
if(isset($_GET['id'])){
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
    $id    = $_GET['id'];
    $query = "SELECT name, type, size, content " .
        "FROM summary WHERE id = '$id'";

    $result = $dbhandle->query($query);

        // output data of each row
        $row = $result->fetch_assoc();
        $size = $row["size"];
        $type = $row["type"];
        $name = $row["name"];
        $content = base64_decode($row["content"]);


    header("Content-length: $size");
    header("Content-type: $type");
    header("Content-Disposition: attachment; filename=$name");
    ob_clean();

    echo $content;
    flush();
    mysqli_close($c);
    exit;
}

?>