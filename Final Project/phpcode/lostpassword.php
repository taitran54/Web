<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/lostpassword.css">
    <script src="js/validformlostpass.js"></script>
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
