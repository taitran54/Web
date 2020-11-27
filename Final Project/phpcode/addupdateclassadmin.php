<?php
require("function.php");
$creatorid = getId($_POST["teacherusername"]);
$name = $_POST["classname"];
$code = $_POST["code"];
$date = getCurrentDateTime();

$target_dir = "uploads/";
$target_file = $target_dir . $_FILES["fileToUpload"]["name"];

if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	die("Sorry, there was an error uploading your file.");
}

require "connection.php";
if ($creatorid!=null){
	if (empty($_POST["id"])) {
		$sql = "INSERT INTO class (name, date, code, image, id_teacher) 
		VALUES (?, ?, ?, ?, ?)";
		echo $sql;
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssssi", $name, $date, $code, $target_file, $creatorid);
	} else {
		$sql = "UPDATE class SET name=?, image=? , id_teacher=? WHERE id=" . $_POST["id"];
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssi", $name, $target_file, $creatorid);
	}

	if ($stmt->execute() === FALSE) {
		die("Error: " . $sql . "<br>" . $conn->error);
	}
}

$conn->close();

header("Location: classadmin.php");

?>