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
?>
<form method="post" enctype="multipart/form-data">
    <table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
        <tr>
            <td width="246">
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                <input name="userfile" type="file" id="userfile">
            </td>
            <td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
        </tr>
    </table>

<?php
if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
    $fileName = $_FILES['userfile']['name'];
    $tmpName  = $_FILES['userfile']['tmp_name'];
    $fileSize = $_FILES['userfile']['size'];
    $fileType = $_FILES['userfile']['type'];

    $fp      = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    $content = addslashes($content);
    fclose($fp);

    $sql = "INSERT INTO summary (name, size, type, content ) ".
        "VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

    if($dbhandle->query($sql)===true){
        echo "uplpaded";
    }

}
?>


</form>
</body>
</html>