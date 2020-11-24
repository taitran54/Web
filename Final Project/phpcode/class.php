<?php
session_start();
if (!isset($_SESSION["user"])) {
	header("Location: loginadmin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="shorcut icon" href="uploads/earth.jpg" type="image/jpg">
</head>
<body>

<style>
    body{
        padding-top: 50px;
    }
    table{

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

<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto" width=100%>

    <tr class="control" style="font-weight: bold; font-size: 20px;">
        <td colspan="7" style="text-align:left;">
            <a href="classform.php" style="padding-left:28px;">Create class</a>
        </td>
		<td colspan="1" style="text-align:center;">
            <a href="logoutadmin.php" style="padding-right:5px;">Logout</a>
        </td>
    </tr>
    <tr class="header" style="font-size:20px;">
		<td>Creator ID</td>
        <td>Class name</td>
        <td>Subject</td>
        <td>Room</td>
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
		<td><?php echo $row["creatorid"] ?></td>
		<td><?php echo $row["name"] ?></td>
		<td><?php echo $row["subject"] ?></td>
		<td><?php echo $row["room"] ?></td>
		<td><img src="<?php echo $row["avatar"] ?>" style="max-height: 80px"></td>
		<td><?php echo $row["date"] ?></td>
		<td><?php echo $row["code"] ?></td>
        <td><a href="classform.php?id=<?php echo $row["id"] ?>">Update</a> | <a href="delete.php?id=<?php echo $row["id"] ?>" class="delete">Delete</a></td>
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