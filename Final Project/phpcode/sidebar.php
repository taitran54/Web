<html>
    <head>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>

    <body>
		<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
			<button onclick="w3_close()" class="w3-bar-item w3-large" style="font-size:20px;font-weight:bold;">☰</button>
			<a href="classadmin.php" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;">Class list</a>
			<a href="classform.php" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;">Create class</a>
			<a href="logout.php" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;">Logout</a>
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