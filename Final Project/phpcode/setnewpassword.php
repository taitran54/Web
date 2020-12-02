<?php 
    require"connection.php";
    // This form using for new password reset form email
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql = " SELECT P.id FROM Profile P WHERE P.email='$email'";
    $result = $conn -> query($sql);
    if ($row=$result->fetch_assoc()){
        $idclass = $row["id"];
        $sql = "UPDATE Account SET password = '$password' WHERE id_profile=$idclass";
        echo ($sql);
        if ($conn ->query($sql)){
            echo("True");
            $conn->close();
            header ("Location: login.php?aleart=success");
            exit;
        }
        $conn->close();
        header ("Location: login.php?aleart=fail");
        exit;
    }
    $conn->close();
    header ("Location: login.php?aleart=fail");
    exit;
?>