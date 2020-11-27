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
