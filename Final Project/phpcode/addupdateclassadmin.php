<?php
$creatorid = $_POST["creatorid"];
$name = $_POST["name"];
$subject = $_POST["subject"];
$room = $_POST["room"];
$code = $_POST["code"];
$date = $_POST["date"];

$target_dir = "uploads/";
$target_file = $target_dir . $_FILES["fileToUpload"]["name"];

if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	die("Sorry, there was an error uploading your file.");
}

require "connection.php";

if (empty($_POST["id"])) {
	$sql = "INSERT INTO class(name, subject, room, date, code, image, id_teacher) 
	VALUES (?, ?, ?, ?, ?, ?, ?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ssssssi", $name, $subject, $room, $date, $code, $target_file, $creatorid);
} else {
	$sql = "UPDATE class SET name=?, subject=?, room=?, image=? WHERE id=" . $_POST["id"];
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ssss", $name, $subject, $room, $target_file);
}

if ($stmt->execute() === FALSE) {
	die("Error: " . $sql . "<br>" . $conn->error);
}

$conn->close();

header("Location: classadmin.php");

?>