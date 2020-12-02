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
?>
<body>
	<div class="card-group" style="border-bottom:1px solid black;">
			<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none;width:19%;" id="mySidebar">
				<button onclick="w3_close()" class="w3-bar-item w3-large" style="font-size:20px;font-weight:bold;">☰</button>
				<a href="Homepage.php" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold; padding-left:10px"><i class='fas fa-house-user' style="font-size:35px;padding-right:10px;"></i>Classes</a>
				<a href="checkjoin.php?id=<?php echo ($idclass );?>" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;border-bottom:1px solid black;"><i class='fas fa-portrait' style="font-size:35px;padding-right:17px;"></i>Request Join</a>
				<a href="#" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;">A</a>
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
				<a href="assignment.php?id=<?php echo ($idclass );?>" style="padđing-top:20px;"><h3>Classwork</h3></a>
			</div>
			
			<div class="card bg-gradient-light text-left border-0 align-middle" style="padding:5px 0px 0px 0px;">	
				<a href="people.php?id=<?php echo ($idclass );?>" style="padđing-top:20px;color:red;"><h3>People</h3></a>
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
				<a class="p-0" href="#">
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
	
	<div class="card-group bg-white">
		<div class="card border-0">
		</div>
		<div class="card" style="border-bottom:1px solid black;border-top:0px;border-right:0px">
			<h3> Teachers </h3>
		</div>
	
		<div class="card" style="border-bottom:1px solid black;border-top:0px;border-right:0px">
		</div>
		<div class="card border-0">
		</div>
	</div>
	<?php
	$sql ="SELECT P.name FROM profile P, Account A
			WHERE A.id in (SELECT id_account FROM joining WHERE id_class = '$idclass')
			AND A.id in (SELECT id FROM account WHERE role = 'teacher')
			AND P.id = A.id_profile";
	$result = $conn -> query($sql);
	while($row = $result->fetch_assoc()) {
	?>
	
	<div class="card-group bg-white">
		<div class="card border-0">
		</div> 	
		<div class="card" style="border-bottom:1px solid black;border-top:0px;border-right:0px">
			<h3> <?php echo ($row['name']);?> </h3>
		</div>
	<?php
	}
	?>
		<div class="card" style="border-bottom:1px solid black;border-top:0px;border-right:0px">
		</div>
		<div class="card border-0">
		</div>
	</div>
	
	<br></br>
	<br></br>
		
	<div class="card-group bg-white border-0">
		<div class="card border-0">
		</div>
		<div class="card" style="border-bottom:1px solid black;border-top:0px;border-right:0px">
			<h3> Classmates </h3>
		</div>
	<?php
	$sql ="SELECT P.name, A.id FROM profile P, Account A
			WHERE A.id in (SELECT id_account FROM joining WHERE id_class = '$idclass')
			AND A.id in (SELECT id FROM account WHERE role = 'student')
			AND A.id_profile = P.id";
	$result = $conn -> query($sql);
	?>
	
		<div class="card text-right" style="border-bottom:1px solid black;border-top:0px;border-right:0px">
			<h3> <?php echo $result->num_rows ?> students </h3>
		</div>
		<div class="card border-0">
		</div>
	</div>
	<?php
	while($row = $result->fetch_assoc()) {
	?>
	<div class="card-group bg-white">
	
		<div class="card border-0">
		</div>
		
		<div class="card" style="border-bottom:1px solid black;border-top:0px;border-right:0px">
			<h3> <?php echo ($row["name"]);?> </h3>
		</div>
	
		<div class="card" style="border-bottom:1px solid black;border-top:0px;border-right:0px">
			<a  href="deletejoining.php?idaccount=<?php echo ($row["id"]) ?>&id=<?php echo($_GET['id'])?>" class="btn bg-black w3-display-right" style="border:0px solid white;"><i class='far fa-times-circle' style="font-size:30px;"></i></a>
		</div>
		<div class="card border-0">
		</div>
		
	</div><?php
	}
	?>
	<?php
	require "aleart.php";
	?>
</body>
		
	
	