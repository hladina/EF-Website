<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zusammenfassungen <?php echo $_GET['klasse'];?></title>
</head>
<body>
<?php
include "dbconfig.php";
include "subjectsFrom DB.php";
?>
<ul>
    <li>Forum
        <ul>
            <?php
            foreach($subjects as $subject){
                echo("
                 <li>
                 <a href='dummyside.php?klasse=$subject'>".$subject."</a>
                 </li>
                 ");
            }
            ?>
        </ul>
    </li>
    <li>
        Zusammenfasseungen
        <ul>
           <?php

           $klassen = ["1","2","3","4","5","6"];
           foreach($klassen as $klasse){
               echo("
                   <li>
                   <a href='summaries.php?klasse=$klasse'>".$klasse.". Klasse</a>
                   </li>
                   ");
            }
            ?>
        </ul>
    </li>
    <li>Zusammenfassung Hinzufügen
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000"><br>
            <input name="userfile" type="file" id="userfile" value="Datei auswählen"><br>
            <select name="class">
                <option name="1">1.Klasse</option>
                <option name="2">2.Klasse</option>
                <option name="3">3.Klasse</option>
                <option name="4">4.Klasse</option>
                <option name="5">5.Klasse</option>
                <option name="6">6.Klasse</option>

            </select>
                <br>
           <select name="subject">
            <?php
            $sql = "select * from subject";
            $result = $dbhandle->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $name = $row["name"];
                    $id = $row["id"];
                    echo "<option value='$id'>" .$name. "</option>";
                }
            }
            ?>
               </select><br>
            <input name="upload" type="submit" class="box" id="upload" value="Hochladen"><br>
        </form>
    </li>
</ul>
<?php

if (isset($_POST['upload'])){

    if ($_FILES['userfile']['size']>0) {
        $fileName = $_FILES['userfile']['name'];
        $tmpName = $_FILES['userfile']['tmp_name'];
        $fileSize = $_FILES['userfile']['size'];
        $fileType = $_FILES['userfile']['type'];

        $content = base64_encode(file_get_contents($tmpName));
        $class = $_POST["class"];
        $subject = $_POST["subject"];

        $sql = "INSERT INTO summary (name, size, type, content, class, subject_id) " .
            "VALUES ('$fileName', '$fileSize', '$fileType', '$content', '$class', '$subject')";

        if ($dbhandle->query($sql) === true) {
            echo "Ihr File wurde hochgeladen";
        }
    }
    else{
        echo "Keine Datei ausgewählt <br>";
    }
}


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

$class = $_GET["klasse"];
include "subjectsFrom DB.php";
for($i = 0; $i < count($subjects_id); $i++) {
    $id = $subjects_id[$i];
    $sql = "SELECT id, name FROM summary WHERE class = $class AND subject_id = $id ";
    $result = $dbhandle->query($sql);

echo "<b>".$subjects[$i]. "</b><br>";

    if ($result === FALSE) {
        echo "Error";
        die($dbhandle->error());
    }

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $name = $row["name"];


            echo "<a href='download.php?id=$id'>" . $name. "</a> <br>";
        }
    } else {
        echo "Keine Zusammenfassungen erhältlich <br>";
    }
}
?>
</body>
</html>