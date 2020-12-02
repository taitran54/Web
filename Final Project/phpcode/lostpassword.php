
<html lang="en">
<head>
    <title>Forgot Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="main.js"></script>
</head>
<body>
	<?php 
		$check = 0;
		if (isset($_GET["aleart"])){
			if ($_GET["aleart"]=="success"){
				$message = "Send email success";
				$check = 1;
			}
			else {
				$message = "Your email is invalid";
			}
		}
		else {
			$message = "";
		}
	?>
    <main>
        <form name="myLostPassForm" action="sendresetpassword.php" method="post" onsubmit="return validateLostPassForm()" >
            <div class="forgotpassword" >
            <img src="uploads/avatar/avatar.png" class="avatar">
				<h1>Forget password <i class='fas fa-question'></i></h1>
				<br></br>
				<?php 
				if ($check == 0){
				?>
                <div>
                    <p class="label label-default" style="font-size:20px;"><i class='far fa-envelope-open' style='font-size:19px'></i> Email</p>

                    <input type="email" class="email" name="email" placeholder="name@mail.com" style="color:black;">
                                        
                    <input type="submit" class="submit" name="submit" onclick="" value="Send Request">                    
                </div>
				<?php 
				}
				?>
				<div>
					<br><p style="color:red;"><?php echo ($message); ?></p></br>
				</div>
				<br></br>
				
				
				<div>
					<a href="login.php" class="w3-button w3-black w3-display-bottomright" style="width:25%;height:10%;"><i class='fas fa-reply w3-display-middle' style="color:white;font-size:20px;"></i></a>
                </div>
			</div>
        </form>
    </main>
</body>
</html>
