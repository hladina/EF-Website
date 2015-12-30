<?php
$username = "root";
$password = "";
$hostname = "localhost";

//connection to the database
$dbhandle = new mysqli($hostname, $username, $password)
or die();
//select a database to work with
$selected = $dbhandle->select_db("EF_Website_Database")
or die();
// Check connection
//execute the SQL query and return records
?>