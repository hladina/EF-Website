<?php
$result = $dbhandle->query("SELECT * FROM subject");
//fetch tha data from the database
if($result === FALSE) {
die($dbhandle->error());
}
$subjects = [];
$subjects_id = [];
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$subjects[] = $row["name"];
    $subjects_id[] = $row["id"];
}
}
else {
echo "0 results";
}
?>