<?php 
try {
    require "connection.php";
    $idclass = $_GET["id"];
    $idaccount = $_GET['idaccount'];
    $sql = "DELETE FROM Joining WHERE id_class = $idclass AND id_account = $idaccount";
    
    if ($conn -> query($sql)){
        header ("Location: people.php?id=$idclass&aleart=success");
        exit;
    }
    header ("Location: people.php?id=$idclass&aleart=fail");
    exit;   
}
catch (Exception $e){
    header ("Location: people.php?id=$idclass&aleart=fail");
    exit; 
}
?>