<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>ClassActivity</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="shorcut icon" href="uploads/earth.jpg" type="image/jpg">	
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
    .bs-example{
        margin: 20px; 
    }
    .navbar-nav {
        padding-left: 400px;
    }
    .nav-item avatar{
        position: absolute;
    }
    .imagecontent {
      left: 200px;
      bottom: auto;
      position: absolute;
    }
    .text {
      color: #000000;
      position: absolute;
      bottom: 200px;
      
    }
    .content {
      height: 400px;
      width: 100%;
      background-image:url(1.jpg) ;     
      background-size: cover;
    } 
    .right textarea{
      padding: 7.5px 15px;
      width: 100%;
      border: 1px solid #cccccc;
      outline: none;
      font-size: 16px;
      min-height: 120px;
      color: #666666;
    }
   
</style>
</head>
<?php
	session_start();
	$idclass = $_GET['id'];
	require "connection.php";
	require 'function.php';
?>
<body>
	<div class="card-group" style="border-bottom:1px solid black;">
			<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none;width:19%;" id="mySidebar">
				<button onclick="w3_close()" class="w3-bar-item w3-large" style="font-size:20px;font-weight:bold;">☰</button>
				<a href="Homepage.php" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold; padding-left:10px"><i class='fas fa-house-user' style="font-size:35px;padding-right:10px;"></i>Classes</a>
				<?php if (canTeach($_SESSION["username"])){?>
				<a href="checkjoin.php?id=<?php echo ($idclass );?>" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;border-bottom:1px solid black;"><i class='fas fa-portrait' style="font-size:35px;padding-right:17px;"></i>Request Join</a>
				<?php }?>
				<a href="To-doAssigned.php?id=<?php echo ($idclass );?>" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;"><i class='far fa-file-alt' style="font-size:35px;padding-right:17px;"></i>To-do</a>
			</div>
			
			<div class="w3-white">
				<button class="w3-button w3-white w3-xlarge" onclick="w3_open()">☰</button>
			</div>
			
			<div class="card bg-gradient-light border-0">	
				<h3> Class name </h3>
			</div>
				
			<div class="card bg-gradient-light border-0">													
			</div>
			
			<div class="card bg-gradient-light border-0 align-middle text-right" style="padding:5px 0px 0px 0px;">	
				<a href="index.php?id=<?php echo ($idclass );?>" style="padđing-top:20px;"><h3>Stream</h3></a>
			</div>
			
			<div class="card bg-gradient-light text-center border-0 align-middle" style="padding:5px 0px 0px 0px;">	
				<a href="assignment.php?id=<?php echo ($idclass );?>" style="padđing-top:20px;color:red;"><h3>Classwork</h3></a>
			</div>
			
			<div class="card bg-gradient-light text-left border-0 align-middle" style="padding:5px 0px 0px 0px;">	
				<a href="people.php?id=<?php echo ($idclass );?>" style="padđing-top:20px;"><h3>People</h3></a>
			</div>
			
			<div class="card bg-gradient-light border-0">			
			</div>
			
			<?php
				$nameuser = $_SESSION["username"];
				require "connection.php";
				$sql = "SELECT P.image as avatar FROM profile P 
					WHERE P.id in (SELECT id FROM account WHERE username = '$nameuser')";
				$result = $conn -> query($sql);
				$row = $result -> fetch_assoc();
			?>
			
			<div class="card text-right border-0" style="padding:15px 20px 0px 0px;">
				<a class="p-0" href="register.php?edit=yes">
                    <img src="<?php echo($row["avatar"]); ?>" class="rounded-circle z-depth-0" alt="avatar image" height="35">
                </a>
			</div>
			
			<script>
			function w3_open() {
				document.getElementById("mySidebar").style.display = "block";
			}

			function w3_close() {
				document.getElementById("mySidebar").style.display = "none";
			}
			</script>
	</div> 
	
	<br></br>
	<br></br>
	
	<div class="card-group">
	
	<div class="card bg-white" style="border:0px solid black;">
	</div>
	
	<div class="card" style="border:1px solid black;">
		<div class="card-header bg-white">
			<table>
				<td>
				</td>
										
				<td>
					<img src=<?php echo($row["avatar"]); ?> class="rounded-circle z-depth-0" alt="avatar image" height="65" width="65">
				</td>
										
				<td>
					<h6 style="margin-left:10px;"> teacher name</h6>
					<h6 style="margin-left:10px;"> time</h6>
				</td>
										
				<td>
					<a  href="#" class="btn bg-white w3-display-topright" style="border:0px solid white;"><i class='far fa-times-circle' style="font-size:30px;"></i></a>
				</td>
			</table>
									
			<div class="card">
				<h6> status here </h6>
				<h6> file here </h6>
			</div>
		</div>
								
		<div class="card-body bg-white" style="border:0px solid black;">
			<h3 style="margin-left:15px;"> number of class comment </h3>
				<table style="border:0px solid black;">
					<td>
						<img src=<?php echo($row["avatar"]); ?> class="rounded-circle z-depth-0" alt="avatar image" height="65" width="65">
					</td>
										
					<td>
						<h6 style="margin-left:10px;"> student name <span> time </span></h6>
						<h6 style="margin-left:10px;"> comment</h6>
					</td>
										
					<td>
					</td>
										
					<td>
					</td>
				</table>
		</div>
								
		<div class="card-footer bg-white">
			<table style="border:0px solid black;">
				<td>
					<img src=<?php echo($row["avatar"]); ?> class="rounded-circle z-depth-0" alt="avatar image" height="65" width="65">
						<!-- avatar student here -->
				</td>
									
				<td colspan="3">
					<textarea class="form-control" rows="2" name="comment" style="width:355px;margin-left:10px;"></textarea> 
				</td>
										
				<td>
				</td>
										
				<td>
					<button style="border:0px solid white;" class="bg-white" type="submit"><i class='far fa-paper-plane' style="font-size:30px;margin-left:0px;"></i></button>
				</td>				
			</table>	
			<p></p>
			<div class="mb-3">
				<div class="input-group">
					<input type="file" id="fileToUpload" name="fileToUpload" required>
				</div>
			</div>
		</div>
	</div>
	
	<div class="card bg-white" style="border:0px solid black;">
	</div>
	
	</div>
	
</body>
</html>	
	
	