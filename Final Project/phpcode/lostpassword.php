
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
    <style type="text/css">
        body{
            margin: 0;
            padding: 0;
            background: url(image/theme.jpg);
            background-size: cover;
            background-position: center;
            font-family: sans-serif;
        }
        .forgotpassword{
            width: 320px;
            height: 420px;
            background: #000;
            color: #fff;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%,-50%);
            box-sizing: border-box;
            padding: 70px 30px;
        }
        .avatar{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            position: absolute;
            top: -50px;
            left: calc(50% - 50px);
        }
        h1{
            margin: 0;
            padding: 0 0 20px;
            text-align: center;
            font-size: 22px;
        }
        .forgotpassword p{
            margin: 0;
            padding: 0;
            font-weight: bold;
        }
        .forgotpassword input{
            width: 100%;
            margin-bottom: 20px;
        }
        .forgotpassword input[type="text"], input[type="password"], input[type="email"]
        {
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
        }
        .forgotpassword input[type="submit"]
        {
            border: none;
            outline: none;
            height: 40px;
            background: #fb2525;
            color: #fff;
            font-size: 18px;
            border-radius: 20px;
        }
        .forgotpassword input[type="submit"]:hover
        {
            cursor: pointer;
            background: #ffc107;
            color: #000;
        }
        .forgotpassword a{
            text-decoration: none;
            font-size: 12px;
            line-height: 20px;
            color: darkgrey;
        }
       .forgotpassword a:hover
        {
            color: #ffc107;
        }
    </style>
    <script type="text/javascript">
        function validateLostPassForm() {
            var user = document.myLostPassForm.username.value;
            var phonee = document.myLostPassForm.phone.value;
            if ( phonee == ""|| user == ""  ) {
                alert("Please Fill All Information");
                return false;
            }
        }
    </script>
</head>
<body>
    <main>
        <form name="myLostPassForm" method="post" onsubmit="return validateLostPassForm()" >
            <div class="forgotpassword" >
            <img src="uploads/brb.jpg" class="avatar">
				<h1>Forget password <i class='fas fa-question'></i></h1>
				<br></br>
                <div>
                    <p class="label label-default" style="font-size:20px;"><i class='far fa-envelope-open' style='font-size:19px'></i> Email</p>

                    <input type="email" class="email" name="email" placeholder="name@mail.com">
                                        
                    <input type="submit" class="submit" name="submit" onclick="" value="Send Request">                    
                </div>
            
				<div>
					<br><p style="color:red;">A</p></br>
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
