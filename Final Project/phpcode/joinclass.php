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

		<style type="text/css">
			.formjoinclass {
            position: absolute;
            left: 25%;
            right: 25%;           
			}       
		</style>
		
		<script type="text/javascript">
		function validationJoinClassName(){
			var checkclassname = document.formjoinclass.classname.value;
			if ( checkclassname == "" ) {
				alert("Please Enter Class Name");
            return false;
			}
        }
		</script>
	</head>
   
	<body>
	<form class="formjoinclass" name="formjoinclass" method="post" onsubmit="return validationJoinClassName()">
		<div class="form-group" style="width:100%;">
		<nav class="navbar navbar-expand-sm navbar-dark bg-primary" style="width:100%;">
			<a class="navbar-brand" href="Homepage.php"><i class="glyphicon glyphicon-remove-circle"></i></a>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link">Join Class</a>
				</li>           
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<button type="submit" class="btn btn-primary">Join</button>
				</li>
			</ul>
		</nav>
		<label for="inputclassname">Class Name</label>
		<input type="text" class="form-control" id="code" aria-describedby="className" placeholder="Code">		
		<small class="form-text text-muted">Ask your teacher for the class name, then enter it here.</small>		
		</div>    
	</form> 	
	
	</body>
</html>
