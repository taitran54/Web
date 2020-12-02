<?php 
    // this for create comment
try{
    session_start();
    require "function.php";
    $idaccount = getId($_SESSION['username']);
    $idstatus = $_POST['idstatus'];
    $description = $_POST['comment'];
    $idclass = $_POST['idclass'];
    $date = getCurrentDateTime();
    require "connection.php";
    $sql = "INSERT INTO Comment (date, description, id_account, id_status)
            VALUES (?, ?, ?, ?)";
    $stm = $conn -> prepare($sql);
    echo (var_dump($stm));
    $stm ->bind_param('ssii', $date, $description, $idaccount, $idstatus);
    if ($stm -> execute()){
            header ("Location: index.php?aleart=success&id=$idclass");
            exit;
        }
        else {
            $conn ->close();
            header ("Location: index.php?aleart=fail&id=$idclass");
            exit;
        }
} catch (Exception $e){
    header ("Location: index.php?aleart=success&id=$idclass");
    exit;
}
?>