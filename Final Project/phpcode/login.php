<html lang="en">
<head>
    <title>Login</title>
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
        .loginbox{
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
        .loginbox p{
            margin: 0;
            padding: 0;
            font-weight: bold;
        }
        .loginbox input{
            width: 100%;
            margin-bottom: 20px;
        }
        .loginbox input[type="text"], input[type="password"]
        {
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
        }
        .loginbox input[type="submit"]
        {
            border: none;
            outline: none;
            height: 40px;
            background: #fb2525;
            color: #fff;
            font-size: 18px;
            border-radius: 20px;
        }
        .loginbox input[type="submit"]:hover
        {
            cursor: pointer;
            background: #ffc107;
            color: #000;
        }
        .loginbox a{
            text-decoration: none;
            font-size: 12px;
            line-height: 20px;
            color: darkgrey;
        }
       .loginbox a:hover
        {
            color: #ffc107;
        }
    </style>
    <script type="text/javascript">
        function validateLoginForm() {
            var user = document.myLoginForm.username.value;
            var pass = document.myLoginForm.password.value;
            if ( user == "" || pass == "") {
                alert("Please Fill All Information");
                return false;
            }
            if (pass.length < 6  ) {
                alert("Password must be at least 6 characters long.");
                return false;
            }
        }
    </script>
</head>
<body>
    <main>
        <div class="loginbox">
        <img src="uploads/avatar/avatar.png" class="avatar">
            <h1>Login Here</h1>
            <form name="myLoginForm" action="" method="post" onsubmit="return validateLoginForm()">
                <p>Username</p>
                <input type="text" name="username" placeholder="Enter Username">
                
                <p>Password</p>
                <input type="password" name="password" placeholder="Enter Password">
                <?php
                    session_start();
                    require "connection.php";
                    if (isset($_POST["username"]) && isset($_POST["password"])) {
                        $username = $_POST["username"];
                        $password = $_POST["password"];
                        $sql = "SELECT A.role FROM account A WHERE A.username=? AND A.password=? ";
                        $stm = $conn->prepare ($sql);
                        $stm-> bind_param('ss', $username, $password);
                        $stm->execute();
                        $result = $stm ->get_result();
                        $num_row = mysqli_num_rows($result);
                        echo ($num_row);
                        if ($num_row > 0) {
                            $row = $result -> fetch_assoc();
                            $_SESSION["username"] = $username;
                            if ($row["role"]=="admin"){
                                echo "<p>COME</p>";
                                header("Location: classadmin.php");
                            }
                            else {
                                header("Location: index.php");
                            }
                        } else {
                            echo "<p>INVALID USERNAME OR PASSWORD</p>";
                        }
                    }
                ?>
                <input type="submit" name="" value="Login">
                <a href="lostpassword.php">Lost your password?</a><br>
                <a href="register.php">Don't have an account?</a>
            </form>      
        </div>
    </main>
</body>
</html>
