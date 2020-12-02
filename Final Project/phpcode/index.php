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
	require "function.php";
	$idclass = $_GET['id'];
?>
<body>
	<div class="card-group">
			<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none;width:19%;" id="mySidebar">
				<button onclick="w3_close()" class="w3-bar-item w3-large" style="font-size:20px;font-weight:bold;">☰</button>
				<a href="Homepage.php" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold; padding-left:10px"><i class='fas fa-house-user' style="font-size:35px;padding-right:10px;"></i>Classes</a>
				<?php if (canTeach($_SESSION["username"])){?>
				<a href="checkjoin.php?id=<?php echo ($idclass );?>" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;border-bottom:1px solid black;"><i class='fas fa-portrait' style="font-size:35px;padding-right:17px;"></i>Request Join</a>
				<?php }?>
				<a href="logout.php" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;">Logout</a>
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
				<a href="index.php?id=<?php echo ($idclass );?>" style="padđing-top:20px;color:red;"><h3>Stream</h3></a>
			</div>
			
			<div class="card bg-gradient-light text-center border-0 align-middle" style="padding:5px 0px 0px 0px;">	
				<a href="assignment.php?id=<?php echo ($idclass );?>" style="padđing-top:20px;"><h3>Classwork</h3></a>
			</div>
			
			<div class="card bg-gradient-light text-left border-0 align-middle" style="padding:5px 0px 0px 0px;">	
				<a href="people.php?id=<?php echo ($idclass );?>" style="padđing-top:20px;"><h3>People</h3></a>
			</div>
			<?php 
				
				if (canTeach($_SESSION["username"])){
			?>
			<!--<div class="card bg-gradient-light text-left border-0 align-middle" style="padding:5px 0px 0px 0px;">	
				<a href="checkjoin.php?id=<?php echo ($idclass );?>" style="padđing-top:20px;"><h3>Reques Join</h3></a>
			</div>-->
			<?php	
				}
			?>
			
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
				<a class="p-0" href="register.php">
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
	
			<?php
				require "connection.php";
				$sql1 ="SELECT C.name, C.image, C.code FROM Class C WHERE C.id = '$idclass'";
				$result1 = $conn -> query($sql1);
				$row1 = $result1 -> fetch_assoc();
			?>
	
	<div class="card border-0">			

			<div class="card-body">
				<div class="container" style="height:225px;width:65%;background-image:url(<?php echo($row1["image"]); ?>); background-size:cover;">
					<h1 style="text-align:top; padding:10px 0px 0px 10px; color:white; font-weight:white;"> <?php echo ($row1["name"]); ?> </h1>
					<?php 
						if (canTeach($_SESSION['username'])){
					?>
							<h2 style="text-align:top; padding:10px 0px 0px 10px; color:white; font-weight:white;">CODE:  <?php echo ($row1["code"]); ?> </h2>

						<?php
						}
						?>
					?>
				</div>
			</div>

	</div>
	
	<div class="card border-0">	

			<div class="card-header border-0" style="background-color:white;">
				<div class="container" style="height:85px;width:67%;">
					<table border=0>
						<td style="border:1px solid black;width:25%;padding-left:20px;">
							<h6>Upcoming</h6> 
							<h6>Woohoo, no work due soon!</h6> 
							<a href="To-doAssigned" style="padding-left:150px;"> View all</a> 
						</td>
						
						<td style="width:3%;">
						</td>
						
						<td style="border:1px solid black;padding:0px 20px 0px 20px; width:1150px;" onclick="myFunction()">
							<h3><i class='far fa-comment-dots'> Share something with your class...</h3></i>
						</td>						
							<script>
								function myFunction() {
									var x = document.getElementById("demo");
									if (x.className.indexOf("w3-show") == -1) {
										x.className += " w3-show";
										x.previousElementSibling.className += " w3-green";
									} else { 
										x.className = x.className.replace(" w3-show", "");
										x.previousElementSibling.className = 
										x.previousElementSibling.className.replace(" w3-green", "");
									}
								}
							</script>							
					</table>
				</div>
			</div>
			
			<div class="card-body border-0" style="background-color:white;">
				<div class="container" style="height:225px;width:67%;">
					<table border=0>
						<td style="border:0px solid black;width:25%;padding-left:20px;">
						</td>
						
						<td style="width:3%;">
						</td>
						
						
						<td style="border:0px solid black;padding:0px 0px 0px 0px; width:1150px;">
							<div id="demo" class="w3-hide w3-bar-block w3-card w3-hide" style="width:695px;">
								<form action="createstatus.php?id=<?php echo $idclass ?>" method="post" enctype="multipart/form-data">
									<div class="card-header w3-bar-item">
										<div class="form-group">
											<textarea class="form-control" rows="5" id="comment" name="description" placeholder="Share with your class" required></textarea>
										</div>
									</div>
									<!-- <input type="submit"> -->
									<div class="card-body w3-bar-item">
										<input type="file" name="fileToUpload" value="Choose File"/>
										<input type="submit" name="send" value="Send"/>
									</div>
								</form>
							</div>
							
							<p></p>
							<p></p>
							<?php
							
							$sql = "SELECT DISTINCT P.name, S.date, S.description, S.id, P.image
									FROM Status S, Class C, Profile P, Account A
									WHERE 	P.id = A.id_profile
										AND A.id = S.id_account
										AND S.id_class = $idclass
									ORDER BY S.date DESC";
							$resultstatus = $conn -> query($sql);
							while ($rowstatus = $resultstatus ->fetch_assoc()){
							?>
							<div class="card" style="border:1px solid black;">
								<div class="card-header bg-white">
									<table>
										<td>
											<img src=<?php echo($rowstatus["image"]); ?> class="rounded-circle z-depth-0" alt="avatar image" height="65" width="65">
										</td>
										
										<td>
											<h6 style="margin-left:10px;"> <?php echo ($rowstatus["name"]) ?></h6>
											<h6 style="margin-left:10px;"> <?php echo ($rowstatus["date"]) ?></h6>
										</td>
										
										<td>
										</td>
										<?php 
										if(canTeach($_SESSION["username"]))
										{
										?>
										<td>
											<a  href="deletestatus.php?id=<?php echo ($idclass) ?>&idstatus=<?php echo($rowstatus['id'])?>" class="btn bg-white" style="border:0px solid white;"><i class='far fa-times-circle' style="font-size:30px;margin-left:360px;"></i></a>
										</td>
										<?php 
										} 
										?>
									</table>
									<div class="card">
										<h6><?php echo ($rowstatus["description"]) ?> </h6>
										<!-- <h6> file here </h6> -->
									</div>
								</div>
								<?php 
									$idstatus = $rowstatus['id'];
									$sql = "SELECT DISTINCT P.name, C.description, C.date, C.id, P.image
											FROM Comment C, Status S, Account A, Profile P
											WHERE C.id_account = A.id
												AND A.id_profile = P.id
												AND C.id_status = $idstatus
											ORDER BY C.date DESC ";
									$resultcomment = $conn ->query ($sql);
								?>
								<div class="card-body">
									<h6 style="margin-left:15px;"> number of class comment <?php echo $resultcomment->num_rows?></h6>
									<?php
											while ($rowcomment = $resultcomment ->fetch_assoc()){
									?>
									<table style="border:0px solid black;">
										
										
										<td>
											<img src=<?php echo($rowcomment["image"]); ?> class="rounded-circle z-depth-0" alt="avatar image" height="65" width="65">
										</td>
										<td>
											<h6 style="margin-left:10px;"> <?php echo $rowcomment ["name"] ?> <span> <?php echo $rowcomment ["date"] ?> </span></h6>
											<h6 style="margin-left:10px;"> <?php echo $rowcomment ["description"] ?></h6>
										</td>
										<?php
										if(canTeach($_SESSION["username"]))
										{
										?>
										<td>
											<a  href="deletecomment.php?id=<?php echo ($idclass) ?>&idcomment=<?php echo($rowcomment['id'])?>" class="btn bg-white" style="border:0px solid white;"><i class='far fa-times-circle' style="font-size:30px;margin-left:300px;"></i></a>
										<td>
										<?php 
										} 
										?>
										<td>
										</td>
										
										<td>
										</td>
									</table>
									<?php 
									}
									?>
								
								</div>
								
								<div class="card-footer bg-white">
									<form action="createcomment.php" method="post">
									<table style="border:0px solid black;">
										<td>
											<img src=<?php echo($row["avatar"]); ?> class="rounded-circle z-depth-0" alt="avatar image" height="65" width="65">
											<!-- avatar student here -->
										</td>
									
										<td colspan="3">
											<input type="hidden" name="idstatus" value ="<?php echo($rowstatus['id'])?>"/>
											<input type="hidden" name="idclass" value ="<?php echo($idclass)?>"/>
											<textarea class="form-control" rows="2" name="comment" style="width:508px;margin-left:10px;" required></textarea> 
										</td>
										
										<td>
										</td>
										
										<td>
											<button  type="submit" class="btn" style="border:0px solid white;" class="bg-white"><i class='far fa-paper-plane' style="font-size:30px;margin-left:10px;"></i></button>
										</td>
									</table>	
									</form>
								</div>
							</div>
							<?php 
							} 
							?>
						</td>
						
						
					</table>
				</div>
			</div>
			<?php
				require "aleart.php";
			?>
			<br></br>
			<br></br>
			<br></br>
			<br></br>
			<br></br>
			<br></br>
			<br></br>
			<br></br>
			<br></br>
			<br></br>
			<br></br>
			<!--<div class="card-footer border-0" style="background-color:white;">
				<div class="container" style="height:225px;width:67%;">
					<table border=0>
						<td style="border:0px solid black;width:25%;padding-left:20px;">
						</td>
						
						<td style="width:3%;">
						</td>
						
						<td style="border:1px solid black;padding:0px 20px 0px 20px; width:1150px;">
							<h3>something</h3>
						</td>						
							<script>
							</script>							
					</table>
				</div>
			</div>-->
						
	</div>
	
</body>
</html>