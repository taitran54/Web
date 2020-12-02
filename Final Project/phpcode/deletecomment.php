<?php 
try {
    require "delete.php";
    $idclass = $_GET['id'];
    $idcomment = $_GET['idcomment'];
    if (deleteComment($idcomment)){
        header ("Location: index.php?aleart=success&id=$idclass");
        exit;
    }
    else {
        header ("Location: index.php?aleart=fails&id=$idclass");
        exit;
    }
}catch (Exceptio $e) {
    $idclass = $_GET['id'];
    header ("Location: index.php?aleart=fail&id=$idclass");
    exit;
}

?>