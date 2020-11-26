<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
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
                        $sql = "SELECT A.role, A.id FROM account A WHERE username='$username' AND password='$password' ";
                        if ($result = $conn->query($sql)){
                            $num_row = mysqli_num_rows($result);
                            if ($num_row > 0) {
                                $row = $result -> fetch_assoc();
                                $id_account= $row["id"];
                                $_SESSION["id_account"] = $id_account;
                                if ($row["role"]=="admin"){
                                    header("Location: admin.php");
                                }
                                else {
                                    header("Location: index.php");
                                }
                            } else {
                                echo "<p>INVALID USERNAME OR PASSWORD</p>";
                            }
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
