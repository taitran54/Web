<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="js/validformlogin.js"></script>
</head>
<body>
    <main>
        <div class="loginbox">
        <img src="image/avatar.png" class="avatar">
            <h1>Login Here</h1>
            <form name="myform" method="post" onsubmit="return validateForm()">
                <p>Username</p>
                <input type="text" name="username" placeholder="Enter Username">
                
                <p>Password</p>
                <input type="password" name="password" placeholder="Enter Password">
                
                <input type="submit" name="" value="Login">
                <a href="lostpassword.php">Lost your password?</a><br>
                <a href="register.php">Don't have an account?</a>
            </form>      
        </div>
    </main>
</body>
</html>