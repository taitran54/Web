<?php
// This file using for insert email and token into database and send resetpassword email with link to user's email
//     function added:
try {
    if (isset($_GET['email'])){
        //check already email and token in resetpass table
        require "function.php";
        require "connection.php";
        $token  = randomString (32); //Create random token
        $email = $_GET['email'];  //MUST change to POST
        $sql = "SELECT P.id FROM Profile P WHERE P.email = ?";
        
        $stm = $conn -> prepare($sql);
        $stm -> bind_param('s', $email);
        $stm ->execute();
        $result = $stm -> get_result();
        $num_row = mysqli_num_rows ( $result );
        // echo ($num_row);
        if ($num_row == 1){

        
            if ($bool=sendResetPasswordEmail($email, $token)){
                
                $sql = "DELETE FROM Resetpass WHERE email = ?";
                $stm = $conn -> prepare($sql);
                $stm -> bind_param('s', $email);
                $stm ->execute();
                echo ("Here");
                $sql = "INSERT INTO Resetpass (email, token) 
                        VALUES (?, ?)";
                $stm = $conn -> prepare($sql);
                $stm -> bind_param('ss', $email, $token);
                $stm ->execute();
                $stm -> close();
                $conn -> close();
            }
            else {
                header("Location: #");
                exit;
            }
            echo ("Success");
        } else {
            echo (var_dump($bool));
            echo ("Fail");
        }
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>