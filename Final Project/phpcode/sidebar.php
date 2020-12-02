<html>
    <head>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>

    <body>
		<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none;width:16%" id="mySidebar">
			<button onclick="w3_close()" class="w3-bar-item w3-xlarge w3-white" style="font-size:20px;font-weight:bold;">☰</button>
			<a href="classadmin.php" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;"><i class='fas fa-list-alt' style="padding-right:15px;"></i>Class list</a>
			<a href="accountlist.php" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;"><i class='fa fa-address-card' style="padding-right:12px;"></i>Account list</a>
			<a href="classform.php" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;"><i class="fas fa-plus-square" style="padding-right:16px;"></i>Create class</a>
			<a href="register.php" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;"><i class="material-icons" style="padding-right:10px;">person_add</i>Create account</a>
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
    </body>
</html>