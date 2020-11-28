
<html lang="en">
<head>
    <title>Forgot Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        .forgotpassword input[type="text"], input[type="password"]
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
            <img src="image/avatar.png" class="avatar">
                <h1>Forgot Password</h1>
                
                    <p>Username</p>
                    <input type="text" name="username" placeholder="Enter Username">
                    
                    <p>Phone</p>
                    <input type="tel" id="phone" name="phone"
                              placeholder="0123456789"
                              pattern="[0]{1}[0-9]{9}">
                    
                    <input type="submit" value="Send Request">
                    <div>
                        Back to<a href="login.php" style="font-size: 17px">Login</a><br>
                    </div>
                      
            </div>
        </form>
    </main>
</body>
</html>
