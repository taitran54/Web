<?php 
    try{
        if (isset ($_GET['token']) and isset($_GET['email'])){
            require "connection.php";
            $sql = "SELECT R.email FROM Resetpass R WHERE R.token = ?";
            $stm = $conn ->prepare ($sql);
            $email = $_GET['email'];
            $token = $_GET['token'];
            $stm -> bind_param('s', $token);
            $stm -> execute();
            $result = $stm -> get_result();

            $row = $result -> fetch_assoc();
            if ($row['email']==$email){
                $sql = "DELETE FROM Resetpass WHERE email = ?";
                $stm = $conn -> prepare($sql);
                $stm -> bind_param('s', $email);
                $stm ->execute();
                ?> 
                <html lang="en">
                <head>
                    <title>Reset Password</title>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <link rel="stylesheet" href="style.css">
                    <script type="text/javascript" src="main.js"></script>
                </head>
                <body id="login">
                    <main>
                        <div class="loginbox">
                        <img src="uploads/avatar/avatar.png" class="avatar">
                            <h1>Reset Pass Here</h1>
                            <form name="myResetPasswordForm" action="setnewpassword.php" method="post" onsubmit="return validateResetForm()">
                                <input type="hidden" name = "email" value="<?php echo $email?>">
                                <p>New Password</p>
                                <input type="password" name="password" placeholder="Enter New Password" required>
                                
                                <p>Confirm Password</p>
                                <input type="password" name="confirmpassword" placeholder="Confirm" required>
                              
                 
                                <br><input type="submit" name="" value="Reset Password"></br>

                            </form>      
                        </div>
                    </main>
                </body>
                </html>

                
            ?>
                <?php
            }
            else {
                echo ("Fail");
            }
        }
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
?>