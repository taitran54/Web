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

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); 

    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header ("Location: register.php?error=image");
        exit;
    }
    // if(isset($_POST["submit"])) {
    //     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    //     if($check !== false) {
    //       echo "File is an image - " . $check["mime"] . ".";
    //       $uploadOk = 1;
        
    //     } 
    //     else {
    //       echo "File is not an image.";
    //       $uploadOk = 0;
    //       header ("Location: register.php?error=image");
    //       exit;
    //     }
    // }
    

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
        $stm-> execute();
        $result = $stm ->get_result();
        $num_row = mysqli_num_rows($result);
        if ($num_row!=0){
            $conn->close();
            header ("Location: register.php?error=email");
            exit;
        }
        

        $sql = "INSERT INTO Profile (name, email, address, phone, birth, image)
                VALUES (?, ?, ?, ?, ?, ?)";

        try {
            $stm = $conn -> prepare ($sql)
            $stm-> bind_param("ssssss", $name, $email, $address, $phone, $birth, $target_file);
            $stm-> execute();

            //select id profile inserted
            $sql = "SELECT P.id FROM Profile P WHERE P.email= ?";
            $stm = $conn->prepare ($sql);
            $stm-> bind_param('s', $email);
            $stm-> execute();
            $result = $stm ->get_result();
            $row = $result->fetch_assoc();
            $id_profile = $row["id"];

            //insert into account
            $sql = "INSERT INTO Account (username, password, role, id_profile) VALUES  (?, ?, ?, ?)";

            $stm = $conn -> prepare ($sql)
            $stm-> bind_param("sssi", $username, $password, $role, $id_profile);
            $stm-> execute();
            
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

        

    } else { //MODIFY Account and Profile
        $sql = "SELECT A.id FROM Account A WHERE A.username= ?";

        $stm = $conn->prepare ($sql);
        $stm-> bind_param('s', $username);
        $stm->execute();
        $result = $stm ->get_result();
        while ($row = $result ->fetch_assoc()){
            if ($row['id'] != $_POST["id"]){
                $conn->close();
                $id = $_POST["id"];
                header ("Location: register.php?error=user&id=$id");
                exit;
            }
        }

        $sql = "SELECT A.id FROM Account A, Profile P WHERE P.id = A.id_profile AND P.email= ?";

        $stm = $conn->prepare ($sql);
        $stm-> bind_param('s', $email);
        $stm->execute();
        $result = $stm ->get_result();
        while ($row = $result ->fetch_assoc()){
            if ($row['id'] != $_POST["id"]){
                $conn->close();
                $id = $_POST["id"];
                header ("Location: register.php?error=email&id=$id");
                exit;
            }
        }

        $id = $_POST["id"];
        $sql = "SELECT P.id FROM Profile P, Account A WHERE A.id_profile= P.id AND A.id = ?";
        $stm = $conn->prepare ($sql);
        $stm-> bind_param('s', $id);
        $stm-> execute();
        $result = $stm ->get_result();
        $row = $result->fetch_assoc();
        $id_profile = $row["id"];

        try{
            $sql = "UPDATE Profile SET name = ? , email = ?, address = ?, phone = ?, birth = ?,image = ? WHERE id=?";
            $stm = $conn -> prepare ($sql);
            $stm-> bind_param("ssssssi", $name, $email, $address, $phone, $birth, $target_file, $id_profile);
            $stm-> execute();

            $sql = "UPDATE Account SET username = ?, password = ?, role = ? WHERE id = ?";
            $stm = $conn -> prepare ($sql);
            $stm-> bind_param("sssi", $username, $password, $role, $id);
            $stm-> execute();
        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

    }
    $stm->close();
    $conn -> close();

    header("Location:#");
    //Status: Finish 
?>