<?php
session_start();
if (!isset($_SESSION["username"])) {
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="shorcut icon" href="uploads/earth.jpg" type="image/jpg">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	<script type="text/javascript" src="main.js"></script>
</head>

<body>

<?php
	include 'sidebar.php';
?>
	
<table class="list" cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto; padding-top: 50px; text-align: center;" width=100%>
	
    <tr class="header" style="font-size:20px;font-weight: bold;">
        <td style="padding: 10px;">Teacher username</td>
        <td style="padding: 10px;">Subject</td>
        <td style="padding: 10px;">Avatar</td>
		<td style="padding: 10px;">Date create</td>
		<td style="padding: 10px;">Code</td>
        <td style="padding: 10px;">Action</td>
    </tr>
	<?php
	require "connection.php";
	
	$sql = "SELECT C.id, A.username, C.name, C.date, C.image, C.code FROM class C, account A WHERE C.id_teacher = A.id";
	$result = $conn->query($sql);
	
	while($row = $result->fetch_assoc()) {
	?>
    <tr class="item" style="border-top: 1px solid #5e5e5e;border-bottom: 1px solid #5e5e5e;min-width: 150px;">
		<td style="padding: 10px;"><?php echo $row["username"] ?></td>
		<td style="padding: 10px;"><?php echo $row["name"] ?></td>
		<td style="padding: 10px;"><img src="<?php echo $row["image"] ?>" style="max-height: 80px"></td>
		<td style="padding: 10px;"><?php echo $row["date"] ?></td>
		<td style="padding: 10px;"><?php echo $row["code"] ?></td>
        <td style="padding: 10px;"><a href="classform.php?id=<?php echo $row["id"] ?>" style="text-decoration: none;font-weight: bold;">Update</a> 
		| <a href="classdelete.php?id=<?php echo $row["id"] ?>" class="delete" style="text-decoration: none;font-weight: bold;">Delete</a></td>
    </tr>
	<?php 
	}
	?>
    <tr class="control" style="text-align: right; font-weight: bold; font-size: 17px">
        <td colspan="8">
            <p style="font-size:20px;">Number of classes: <?php echo $result->num_rows ?></p>
        </td>
    </tr>
</table>

<?php
		if (isset($_GET["aleart"])){
		echo '<script language="javascript">';
		if ($_GET["aleart"]=="success"){
			echo 'alert("Succes")';
		}
		else if ($_GET["aleart"]=="fail"){
			echo 'alert("Fail")';
		}
		echo '</script>';
		}
	?>
</body>
</html>