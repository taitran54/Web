<?php 
require "delete.php";
$id = $_GET["id"];
if (deleteClass($id)){
    // $conn ->close();
    header ("Location: classadmin.php?aleart=success");
    exit;
} else {
    // $conn ->close();
    header ("Location: classadmin.php?aleart=fail");
    exit;
}
?>