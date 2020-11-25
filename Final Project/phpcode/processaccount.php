<?php 
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $name = $_POST["fullname"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $birth = $_POST["dateofbirth"];
    $phone = $_POST["phone"];

    $target_dir = "uploads/avatar/";
    echo (print_r($_FILES));

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); 

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
          if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            die("Sorry, there was an error uploading your file.");
            }
        } 
        else {
          echo "File is not an image.";
          $uploadOk = 0;
          header ("Location: register.php?error=image");
          exit;
        }
    }
    

    require "connection.php";

    if (!isset($_POST["id"])){
        $sql = "SELECT A.id FROM Account A WHERE A.username= ?";

        $stm = $conn->prepare ($sql);
        $stm-> bind_param('s', $username);
        $stm->execute();
        $result = $stm ->get_result();
        $num_row = mysqli_num_rows($result);
        if ($num_row!=0){
            $conn->close();
            header ("Location: register.php?error=user");
            exit;
        }

        $sql = "SELECT P.id FROM Profile P WHERE P.email= ?";

        $stm = $conn->prepare ($sql);
        $stm-> bind_param('s', $email);
        $stm->execute();
        $result = $stm ->get_result();
        $num_row = mysqli_num_rows($result);
        if ($num_row!=0){
            $conn->close();
            header ("Location: register.php?error=email");
            exit;
        }
        

    }

    $conn ->close();
?>