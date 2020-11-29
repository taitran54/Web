<?php
$code = $_POST['code'];
require "function.php";
session_start();
$id_account = getId($_SESSION["username"]);

require "connection.php";
$sql = "SELECT C.id FROM Class C WHERE C.code = ?";
$stm = $conn ->prepare ($sql);
$stm -> bind_param ('s', $code);
$stm ->execute();
$result = $stm -> get_result();
if ($row = $result->fetch_assoc()){
    $id_class=$row['id'];
    echo ($id_class);
    echo ($id_account);
    $sql = "INSERT INTO Joining (id_account, id_class, approval)
            VALUES ($id_account, $id_class, 0)";
    if ($result= $conn -> query($sql)){
        header("Location: Homepage.php");
        exit;
    }
}
header("Location: joinclass.php?error=code");
?>