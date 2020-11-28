<?php
// This file using for insert email and token into database and send resetpassword email with link to user's email
//     function added:
try {
    if (isset($_POST['email'])){
        //check already email and token in resetpass table
        require "function.php";
        require "connection.php";
        $token  = randomString (32); //Create random token
        $email = $_POST['email'];
        $sql = "SELECT P.id FROM Profile P WHERE P.email = ?";
        $stm = $conn -> prepare($sql);
        $stm -> bind_param('s', $email);
        $stm ->execute();

        
        if (sendResetPasswordEmail($email, $token)){

            $sql = "DELETE FROM Resetpass WHERE email = ?";
            $stm = $conn -> prepare($sql);
            $stm -> bind_param('s', $email);
            $stm ->execute();

            $sql = "INSERT INTO Resetpass (email, token) 
                    VALUES (?, ?)";
            $stm = $conn -> prepare($sql);
            $stm -> bind_param('s', $email);
            $stm ->execute();
            $stm -> close();
            $conn -> close();
        }
        else {
            header("Location: #");
            exit;
        }
        echo ("Success");
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>