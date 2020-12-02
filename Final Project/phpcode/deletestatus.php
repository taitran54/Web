<?php 
try {
    $idclass = $_GET['id'];
    require "delete.php";
    if (deleteStatus($_GET['idstatus'])){
        header ("Location: index.php?aleart=success&id=$idclass");
        exit;
    }
    else {
        header ("Location: index.php?aleart=fails&id=$idclass");
        exit;
    }

} catch (Exceptio $e) {
    $idclass = $_GET['id'];
    header ("Location: index.php?aleart=fail&id=$idclass");
    exit;
}

?>