<?php 
    require "connection.php";

    $id_class = $_GET["idclass"];
    $id_account = $_GET["idaccount"];
    if ($_GET["accept"]=="yes"){
        $sql = "UPDATE Joining SET approval = 1 WHERE id_class = $id_class 
                                                        AND id_account = $id_account ";
        if ($conn -> query($sql)){
            header("Location: checkjoin.php?aleart=success&id=$id_class");
            exit;
        }
        else {
            header("Location: checkjoin.php?aleart=fail&id=$id_class");
            exit;
        }
    }
    if ($_GET["accept"]=="no"){
        $sql = "DELETE FROM Joining WHERE id_class = $id_class 
                                AND  id_account = $id_account";
        // echo ($sql);
        if ($conn -> query($sql)){
            header("Location: checkjoin.php?aleart=success&id=$id_class");
            exit;
        }
        else {
            header("Location: checkjoin.php?aleart=fail&id=$id_class");
            exit;
        }                       
    }

?>