<?php
require("function.php");
$description = $_POST["description"];
$date = getCurrentDateTime();
$idclass = $_GET["id"];
session_start();
$idaccount=getId($_SESSION["username"]);
// echo $date;
// echo $description;
// echo $idclass;
// echo $idaccount;
require "connection.php";
$sql = "INSERT INTO Status (date, description, id_class, id_account) 
                VALUES (?, ?, ?, ?)";
$stm = $conn -> prepare($sql);
$stm -> bind_param('ssii', $date, $description, $idclass, $idaccount);
if (!$stm -> execute()){
    $conn ->close();
    header ("Location: index.php?aleart=fail&id=$idclass");
    exit;
}

if (!($_FILES['fileToUpload']['size'] == 0 && $_FILES['fileToUpload']['error'] == 0)){
    $target_dir = "uploads/submit/";
    $target_file = $target_dir . $_FILES["fileToUpload"]["name"];
    
    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header ("Location: index.php?aleart=success&id=$idclass");
        exit;
    } else {
        $sql = "SELECT S.id FROM Status S WHERE S.date = '$date' AND S.id_account = $idaccount";
        echo ($sql);
        $result = $conn -> query($sql);
        $row = $result -> fetch_assoc();

        $idstatus = $row['id'];

        $sql = "INSERT INTO  UploadFile(target_dir, id_status) 
                    VALUES ('$target_file', $idstatus)";

        if ($conn -> query ($sql)){
            $conn ->close();
            header ("Location: index.php?aleart=success&id=$idclass");
            exit;
        }
        else {
            $conn ->close();
            header ("Location: index.php?aleart=fail&id=$idclass");
            exit;
        }
    }
    
    
}
$conn ->close();
header ("Location: index.php?aleart=success&id=$idclass");
exit;

?>fa