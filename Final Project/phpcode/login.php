<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="main.js"></script>
</head>
<body id="login">
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
                        if ($num_row > 0) {
                            $row = $result -> fetch_assoc();
                            $_SESSION["username"] = $username;
                            if ($row["role"]=="admin"){
                                echo "<p>COME</p>";
                                header("Location: classadmin.php");
                            }
                            else {
                                header("Location: Homepage.php");
                            }
                        } else {
                            echo "<p>INVALID USERNAME/PASSWORD</p>";
                        }
                    }
                ?>
                <br><input type="submit" name="" value="Login"></br>
                <a href="lostpassword.php" style="font-size:16px;">Lost your password?</a></br>	
                <a href="register.php" style="font-size:16px;">Don't have an account?</a>
            </form>      
            <?php
		if (isset($_GET["aleart"])){
		echo '<script language="javascript">';
		if ($_GET["aleart"]=="success"){
			echo 'alert("Succes")';
		}
		else if ($_GET["aleart"]=="fail"){
			echo 'alert("Fail")';
		}
		echo '</script>';
		}
	?>
        </div>
    </main>
</body>
</html>
