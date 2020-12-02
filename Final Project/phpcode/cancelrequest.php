<?php
try{
    require "connection.php";
    $email=$_GET['email'];
    $idclass = $_GET['id'];
    $sql = "SELECT A.id FROM Profile P, Account A
            WHERE  A.id_profile = P.id
            AND P.email='$email'";
    $result = $conn->query($sql);
    $row = $result ->fetch_assoc();
    $id=$row['id'];
    $sql = "SELECT J.approval FROM Joining J
            WHERE   J.id_account = $id
                AND J.id_class=$idclass";
                echo($sql);
    $result = $conn->query($sql);
    if ($row = $result ->fetch_assoc()){
        if ($row['approval']==2){
            $sql = "DELETE FROM Joining WHERE id_account = $id
                                    AND id_class=$idclass";
            echo($sql);
            $conn ->query($sql);
            $conn->close();
            header ("Location: login.php?aleart=success");
            exit;
        }
    }
    $conn->close();
    header ("Location: login.php?aleart=fail");
    exit;
    
} catch (Exception $e){
    header ("Location: login.php?aleart=fail");
    exit;
}
?>