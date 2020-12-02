<?php
try{
    require "connection.php";
    $email=$_GET['email'];
    $idclass = $_GET['id'];
    $sql = "SELECT A.id FROM Profile P, Account A
            WHERE   A.id_profile = P.id
                AND P.email='$email'";
    $result = $conn->query($sql);
    $row = $result ->fetch_assoc();
    $id=$row['id'];
    $sql = "UPDATE Joining SET approval = 1 WHERE id_account = $id AND id_class=$idclass";
    echo($sql);
    $conn ->query($sql);
    $conn->close();
    header ("Location: login.php?aleart=success");
    exit;
} catch (Exception $e){
    header ("Location: login.php?aleart=fail");
    exit;
}
?>