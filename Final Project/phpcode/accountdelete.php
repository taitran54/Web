<?php 
try{
    $idaccount  = $_GET['id'];
    require "delete.php";
    if (deleteAccount($idaccount)){
        header("Location: accountlist.php?aleart=success");
        exit;
    }
    else {
        header("Location: accountlist.php?aleart=fail");
        exit;
    }
} catch (Exception $e){
    header("Location: accountlist.php?aleart=fail");
    exit;
}

?>