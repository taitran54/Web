<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Join Class</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script type="text/javascript" src="main.js"></script>
		<link rel="stylesheet" href="style.css">
		
	</head>
   
	<body>
	<form class="formjoinclass" name="formjoinclass" action = "processjoin.php" method="post" onsubmit="return validationJoinClassName()">
		<div class="form-group">
		<nav class="navbar navbar-expand-sm navbar-light bg-white" style="border-bottom:1px solid gray;">
			<a class="navbar-brand" href="Homepage.php"><i class="glyphicon glyphicon-remove-circle w3-display-left" style="font-size:40px;padding-left:30px;"></i></a>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<p class="w3-display-left" style="padding-left:95px;font-size:23px;">Join class</p>
				</li>           
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item" style="padding-right:200px;">
					<button type="submit" class="btn btn-gray w3-display-right" style="font-size:14px;width:70px;">Join</button>
				</li>
			</ul>
		</nav>
		<br> <div class="card border-0">
		<?php
			require "connection.php";
			session_start();
			
			$username = $_SESSION["username"];
			$sql = "SELECT A.username, P.name, P.image FROM Account A, Profile P
					WHERE P.id = A.id_profile
						AND A.username = '$username'";
			$result = $conn -> query ($sql);
			$row = $result -> fetch_assoc();
			$conn ->close();
			
		?>
			<div class="card-header bg-white border-0">
				<h6 class="form-text text-muted" style="padding-right:168px; text-align:center;">You're currently signed in as</h6>
				<div class="card-group border-0 bg-white">
					<div class="card border-0">
					</div>
					<div class="card border-0">
					</div>
					<div class="card border-0">
						<img src="<?php echo($row["image"]); ?>" class="rounded-circle z-depth-0 w3-display-right" alt="avatar image" height="60px" width="60px" style="margin-right:20px;">
					</div>
					<div class="card border-0">
						<h6 class="form-text text-muted" style="padding-left:10px;text-align:left;" name="name"><?php echo ($row["name"]);?></h6></h6>
						<h6 class="form-text text-muted" style="padding-left:10px;text-align:left;" name="username"><?php echo ($row["username"]);?></h6></h6>
					</div>
					<div class="card border-0">
						<a href="logout.php" class="btn w3-display-right" style="color:blue;border:1px solid black;">Switch account</a>
					</div>
					<div class="card border-0">
					</div>
					<div class="card border-0">
					</div>
				</div>
			</div>
			
			<div class="card-body bg-white border-0">
				<h6 class="form-text text-muted" style="padding-right:271px;font-size:20px;text-align:center;font-weight:bold;">Class code</h6>
				<h6 class="form-text text-muted" style="padding-left:13px;text-align:center;">Ask your teacher for the class code, then enter it here.</h6>
				<input type="text" class="form-control" id="code"name = "code" aria-describedby="className" placeholder="Class code" style="width:20%;text-align:left;margin-left:564px;height:50px;">
			</div>
			
			<div class="card-footer border-0 bg-white">
				<h6 class="form-text text-muted" style="padding-right:140px;font-size:18px;text-align:center;font-weight:bold;">To sign in with a class code</h6>
				<ul>
					<h6 class="form-text text-muted" style="padding-right:750px;text-align:center;"><li style="font-size:14px;margin-left:542px;">Use an authorized account</h6></li>
					<h6 class="form-text text-muted" style="padding-left:94px;text-align:center;padding-right:476px;"><li style="font-size:14px;margin-left:447px;">Use a class code with 5-7 letters or numbers, and no spaces or symbols</h6></li>
				</ul>
				<h6 class="form-text text-muted" style="padding-left:92px;text-align:center;">If you have trouble joining the class, go to the <a href="https://support.google.com/edu/classroom/answer/6020297" style="color:blue;">Help Center article</a>
			</div>
			</div>
		</div> 
		<?php
			if (isset($_GET["error"])){
			echo '<script language="javascript">';
			if ($_GET["error"]=="code"){
				echo 'alert("Your code is invalid")';
			}
			echo '</script>';
			}
		?>
	</form> 	
	
	</body>
</html>
