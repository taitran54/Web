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
                echo ("Got");
                $sql = "DELETE FROM Resetpass WHERE email = ?";
                $stm = $conn -> prepare($sql);
                $stm -> bind_param('s', $email);
                $stm ->execute();
            }
            else {
                echo ("Fail");
            }
        }
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
?>