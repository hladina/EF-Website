<?php
if(isset($_GET['id'])){
   include "dbconfig.php";
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