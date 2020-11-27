<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>To-do</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="shorcut icon" href="uploads/earth.jpg" type="image/jpg">	
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	<div class="card-group">
			<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
				<button onclick="w3_close()" class="w3-bar-item w3-large" style="font-size:20px;font-weight:bold;">☰</button>
				<a href="#" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;">A</a>
				<a href="#" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;">B</a>
				<a href="#" class="w3-bar-item w3-button" style="font-size:20px;font-weight:bold;">C</a>
			</div>
			
			<div class="w3-white">
				<button class="w3-button w3-white w3-xlarge" onclick="w3_open()">☰</button>
			</div>
			
			<div class="card bg-gradient-light border-0">	
				<h3> To-do </h3>
			</div>
				
			<div class="card bg-gradient-light border-0">	
				<p></p>
				<p></p>
				<p></p>
				<p></p>
				<p></p>
					<div class="w3-dropdown-click">
						<button class="w3-button btn-block" onclick="myFunction()" style="font-size:20px;">
							All classes <i class="fa fa-caret-down"></i>
						</button>
					<div id="demo" class="w3-dropdown-content w3-bar-block w3-card" style="width:211px;">
						<a href="#" class="w3-bar-item w3-button">Link 1</a>
						<a href="#" class="w3-bar-item w3-button">Link 2</a>
						<a href="#" class="w3-bar-item w3-button">Link 3</a>
					</div>
					</div>
								
					<button class="w3-button w3-block w3-left-align" onclick="myFunction2()" style="font-size:20px;">
						This week <i class="fa fa-caret-down"></i>
					</button>
					<div id="demo2" class="w3-hide w3-card w3-bar-block">
						<a href="#" class="w3-bar-item w3-button">Link</a>
						<a href="#" class="w3-bar-item w3-button">Link</a>
					</div>
				
					<button class="w3-button w3-block w3-left-align" onclick="myFunction3()" style="font-size:20px;">
						Next week <i class="fa fa-caret-down"></i>
					</button>
					<div id="demo3" class="w3-hide w3-card w3-bar-block">
						<a href="#" class="w3-bar-item w3-button">Link</a>
						<a href="#" class="w3-bar-item w3-button">Link</a>
					</div>
				
				<script>
				function myFunction() {
					var x = document.getElementById("demo");
					if (x.className.indexOf("w3-show") == -1) {
						x.className += " w3-show";
					} else { 
						x.className = x.className.replace(" w3-show", "");
					}
				}
				
				function myFunction1() {
					var x = document.getElementById("demo1");
					if (x.className.indexOf("w3-show") == -1) {
						x.className += " w3-show";
						x.previousElementSibling.className += " w3-green";
					} else { 
						x.className = x.className.replace(" w3-show", "");
						x.previousElementSibling.className = 
						x.previousElementSibling.className.replace(" w3-green", "");
					}
				}

				
				function myFunction2() {
					var x = document.getElementById("demo2");
					if (x.className.indexOf("w3-show") == -1) {
						x.className += " w3-show";
						x.previousElementSibling.className += " w3-green";
					} else { 
						x.className = x.className.replace(" w3-show", "");
						x.previousElementSibling.className = 
						x.previousElementSibling.className.replace(" w3-green", "");
					}
				}
				
				function myFunction3() {
					var x = document.getElementById("demo3");
					if (x.className.indexOf("w3-show") == -1) {
						x.className += " w3-show";
						x.previousElementSibling.className += " w3-green";
					} else { 
						x.className = x.className.replace(" w3-show", "");
						x.previousElementSibling.className = 
						x.previousElementSibling.className.replace(" w3-green", "");
					}
				}
				
				function myFunction4() {
					var x = document.getElementById("demo4");
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
			</div>
			
			<div class="card bg-gradient-light border-0 align-middle text-right">	
				<a href="To-doAssigned.php" style="padđing-top:20px;color:red;"><h3>Assigned</h3></a>
			</div>
			
			<div class="card bg-gradient-light text-center border-0 align-middle">	
				<a href="To-doMissing.php" style="padđing-top:20px;"><h3>Missing</h3></a>
			</div>
			
			<div class="card bg-gradient-light text-left border-0 align-middle">	
				<a href="To-doDone.php" style="padđing-top:20px;"><h3>Done</h3></a>
			</div>
			
			<div class="card bg-gradient-light border-0">			
			</div>
			
			<div class="card border-0">
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
</body>