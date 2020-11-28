<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add/Update Class</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="shorcut icon" href="uploads/earth.jpg" type="image/jpg">	
	
  </head>
  <?php
	include 'sidebar.php';
  ?>

  <body class="bg-light">
	<?php
	$id = "";
	$creatorusername= "";
	$name = "";
	$date = "";
	$code = "";
	$title = "Add Class";
	$buttonTitle = "Add";

	
	if (isset($_GET["id"])) {
		require "connection.php";
		$id = $_GET["id"];
		$sql = "SELECT A.username, C.name, C.date, C.code  FROM class C, account A WHERE A.id =C.id_teacher AND C.id=" . $id;
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if ($row) {
			$name = $row["name"];
			$creatorusername = $row["username"];
			// $room = $row["room"];
			$code = $row["code"];
		}
		$title = "Update Class";
		$buttonTitle = "Update";
	}
	require 'function.php';
?>

    <div class="container">
		<div class="py-5 text-center">
			<h2><?php echo $title ?></h2>
		</div>

		<div class="row">
			<div class="col-md order-md-1">
			<form action="addupdateclassadmin.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $id ?>">
				<input type="text" id="date" name="date" value="<?php echo $date ?>" required hidden>
				<input type="text" class="form-control" id="code" name="code" value="<?php echo $code ?>" required hidden>
				<div class="mb-3" style="visibility:<?php echo checkAdmin($_SESSION["username"])? "":"hidden"?>">
					<label for="name">Lecture username</label>
					<div class="input-group">
						<input type="text" class="form-control" id="teacherusername" name="teacherusername" value="<?php echo $creatorusername ?>" required>
					</div>
				</div>
			
				<div class="mb-3">
					<label for="subject">Subject</label>
					<div class="input-group">
						<input type="text" class="form-control" id="classname" name="classname" value="<?php echo $name ?>" required>
					</div>
				</div>
			
				<!-- <div class="mb-3">
					<label for="room">Room</label>
					<div class="input-group">
						<input type="text" class="form-control" id="room" name="room" value="" required>
					</div>
				</div> -->
										
				<div class="mb-3">
					<label for="fileToUpload">Avatar</label>
					<div class="input-group">
						<input type="file" id="fileToUpload" name="fileToUpload" required>
					</div>
				</div>
													
				<hr class="mb-4">
				<button class="btn btn-primary btn-lg btn-block" style="background-color:grey;" onclick="createcode(7);callDate()" type="submit">
					<?php
						echo $buttonTitle;
					?>
				</button>				
				<script>
					function createcode(length){
						var result           = '';
						var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
						var charactersLength = characters.length;
						for ( var i = 0; i < length; i++ ) {
							result += characters.charAt(Math.floor(Math.random() * charactersLength));
						}
						document.getElementById("code").value = result;
					}
					function callDate(){
						n =  new Date();
						y = n.getFullYear();
						m = n.getMonth() + 1;
						d = n.getDate();
						h = n.getHours();
						mi = n.getMinutes();
						s = n.getSeconds();
						document.getElementById("date").value = d + "/" + m + "/" + y +" "+ h + ":" + mi + ":" + s;
					}
				</script>
			</form>
			</div>
		</div>

		<footer class="my-5 pt-5 text-muted text-center text-small">
		</footer>
    </div>
  </body>
</html>