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
	<link rel="shorcut icon" href="uploads/earth.jpg" type="image/jpg">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<style>
    table{
		padding-top: 50px;
        text-align: center;
    }
    td{
        padding: 10px;
    }
    tr.item{
        border-top: 1px solid #5e5e5e;
        border-bottom: 1px solid #5e5e5e;
    }

    tr.item:hover{
        background-color: #d9edf7;
    }

    tr.item td{
        min-width: 150px;
    }

    tr.header{
        font-weight: bold;
    }

    a{
        text-decoration: none;
    }
    a:hover{
        color: deeppink;
        font-weight: bold;
    }
</style>
	

	<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none;width:16%" id="mySidebar">
		<button onclick="w3_close()" class="w3-bar-item w3-xlarge w3-white" style="font-size:20px;font-weight:bold;">☰</button>
		<a href="#" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;"><i class="glyphicon glyphicon-home" style="padding-right:10px;"></i>Home</a>
		<a href="classadmin.php" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;"><i class='fas fa-list-alt' style="padding-right:10px;"></i>Class list</a>
		<a href="#" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;"><i class='fas fa-lock' style="padding-right:10px;"></i>Account list</a>
		<a href="classform.php" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;"><i class="fa fa-address-card" style="padding-right:10px;"></i>Create class</a>
		<a href="#" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;"><i class="material-icons" style="padding-right:10px;">person_add</i>Create account</a>
		<a href="logout.php" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;"><i class='fas fa-door-open' style="padding-right:10px;"></i>Logout</a>
	</div>
	<div class="w3-white">
		<button class="w3-button w3-white w3-xlarge" onclick="w3_open()">☰</button>
	</div>
	<script>
		function w3_open() {
			document.getElementById("mySidebar").style.display = "block";
		}

		function w3_close() {
			document.getElementById("mySidebar").style.display = "none";
		}
	</script>
	
<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto" width=100%>
	
    <tr class="header" style="font-size:20px;">
        <td>Teacher username</td>
        <td>Subject</td>
        <td>Avatar</td>
		<td>Date create</td>
		<td>Code</td>
        <td>Action</td>
    </tr>
	<?php
	require "connection.php";
	
	$sql = "SELECT * FROM class";
	$result = $conn->query($sql);
	
	while($row = $result->fetch_assoc()) {
	?>
    <tr class="item">
		<td><?php echo $row["id_teacher"] ?></td>
		<td><?php echo $row["subject"] ?></td>
		<td><img src="<?php echo $row["image"] ?>" style="max-height: 80px"></td>
		<td><?php echo $row["date"] ?></td>
		<td><?php echo $row["code"] ?></td>
        <td><a href="classform.php?id=<?php echo $row["id"] ?>">Update</a> | <a href="deleteadmin.php?id=<?php echo $row["id"] ?>" class="delete">Delete</a></td>
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

</body>
</html>