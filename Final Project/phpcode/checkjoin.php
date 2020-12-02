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
	$idclass = $_GET['id'];
	require "connection.php";
	$sql=" SELECT name FROM class";
	$result = $conn -> query($sql);
	$row = $result -> fetch_assoc();
	?>
	<div class="card-group">
			<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none;width:19%;" id="mySidebar">
				<button onclick="w3_close()" class="w3-bar-item w3-large" style="font-size:20px;font-weight:bold;">☰</button>
				<a href="index.php?id=<?php echo ($idclass );?>"  class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;border-bottom:1px solid black;"><i class='fas fa-chevron-circle-left' style="font-size:35px;padding-right:10px;"></i>Return class</a>
				<a href="#" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;"></a>
			</div>
			
			<div class="w3-white">
				<button class="w3-button w3-white w3-xlarge" onclick="w3_open()">☰</button>
			</div>
			
			<div class="card bg-gradient-light border-0">	
				<h3> <?php echo ($row["name"]);?> </h3>
			</div>
				
			<div class="card bg-gradient-light border-0">													
			</div>
			
			<div class="card bg-gradient-light border-0">			
			</div>
			
			<div class="card text-right border-0" style="padding:15px 20px 0px 0px;">
				<a class="p-0" href="#">
                    <img src="uploads/brb.jpg" class="rounded-circle z-depth-0" alt="avatar image" height="35">
                </a>
			</div>
			
	</div>
	
<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto; padding-top: 50px; text-align: center;" width=100%>
	
    <tr class="header" style="font-size:20px;font-weight: bold;">
        <td style="padding: 10px;">Username</td>
        <td style="padding: 10px;">Student name</td>
        <td style="padding: 10px;">Avatar</td>
		<td style="padding: 10px;">Date create</td>
    </tr>
	<?php
	require "connection.php";
	
	$id = $_GET['id'];
	$sql = "SELECT A.id, A.username, P.name, P.image 
			FROM Profile P, Account A, Joining J 
			WHERE P.id = A.id_profile
				AND	A.id = J.id_account
				AND J.id_class = $id
				AND J.approval = 0";
	$result = $conn->query($sql);

	// echo $_GET["id"];
	
	while($row = $result->fetch_assoc()) {
	?>
    <tr class="item" style="border-top: 1px solid #5e5e5e;border-bottom: 1px solid #5e5e5e;min-width: 150px;">
		<td style="padding: 10px;"><?php echo $row["username"] ?></td>
		<td style="padding: 10px;"><?php echo $row["name"] ?></td>
		<td style="padding: 10px;"><img src="<?php echo $row["image"] ?>" style="max-height: 80px"></td>
        <td style="padding: 10px;"><a href="processjoining.php?accept=yes&idclass=<?php echo( $_GET["id"]);?>&idaccount=<?php echo ($row["id"]); ?>" style="text-decoration: none;font-weight: bold;">Accept</a> | 
		<a href="processjoining.php?accept=no&idclass=<?php echo ($_GET["id"]);?>&idaccount=<?php echo ($row["id"]); ?>" class="delete" style="text-decoration: none;font-weight: bold;">Decline</a></td>
    </tr>
	<?php 
	}
	?>

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
    <tr class="control" style="text-align: right; font-weight: bold; font-size: 17px">
        <td colspan="8">
            <p style="font-size:20px;">Number of students are waiting for acception: <?php echo $result->num_rows ?></p>
        </td>
    </tr>
</table>

</body>
</html>