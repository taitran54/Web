<?php
require "connection.php";

$id = $_GET["id"];

$sql = "DELETE FROM class WHERE id=" . $id;

if ($conn->query($sql) === FALSE) {
  die("Error deleting record: " . $conn->error);
}

$conn->close();

header("Location: classadmin.php");
?>