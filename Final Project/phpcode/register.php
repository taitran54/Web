<!DOCTYPE html>
<html>
    <head>
        <title>
        <?php
            if (isset ($_GET["id"])){
                echo ("Edit Profile");
            } else {
                echo ("Registation");
            }
        ?>
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="main.js/validformregis.js"></script>
    </head>
    <body>

    <?php 
    $id = "";
    $username = "";
    $password = "";
    $role = "";
    $name = "";
    $address = "";
    $email = "";
    $brith = "";
    $title = "Registor";
    $buttonTitle = "Sign up";

    if (isset($_GET["id"])){
        require "connection.php";
        $id = $_GET["id"];
        $sql = "SELECT A.username, A.password, A.role, P.name, P.email, P.address, P.birth, P.phone 
            FROM Account A, Profile P WHERE A.id_profile = P.id AND A.id=".$id;
        $result =$conn->query ($sql);
        $row = $result ->fetch_assoc();  
        
        if ($row){
            $username = $row["username"];
            $password = $row["password"];
            $role = $row["role"];
            $name = $row["name"];
            $address = $row["address"];
            $email = $row["email"];
            $brith = $row["birth"];
        }

        $title = "Edit Account";
        $buttonTitle = "Update";
    }
    ?>
            <form name="myRegisterForm" method="post" onsubmit="return validateRegisterForm()">
                <div class="register-form">
                    <div class="input-box">
                        Full Name: <input type="text" name="fullname" placeholder="Enter Full Name" value= "<?php echo ($name)?>" required>
                    </div>

                    <div class="input-box">    
                        Username: <input type="text" name="username" placeholder="Enter UserName" value ="<?php echo ($username)?>" required><br>
                    </div>

                    <div class="input-box">    
                        Password: <input type="password" name="password" placeholder="Enter Password" value = "<?php echo ($password)?>" required><br> 
                    </div>

                    <div class="input-box">
                        Re-type Password: <input type="password" name="password2"  placeholder="Re-type Password" value = "<?php?>">
                    </div>

                    <div class="input-box">
                        Address: <input type="text" name="address" placeholder="Enter Address">
                    </div>

                    <div class="input-box">
                        Enter a phone number: <input type="tel" id="phone" name="phone"
                          placeholder="0123456789"
                          pattern="[0]{1}[0-9]{9}">
                    </div>

                    <div class="input-box">
                        Image: <input type="file" name="image" placeholder="Image">
                    </div>

                    <div class="input-box">
                        <div class="col-6"  onsubmit="return checkForm()"  >
                            <label for="dateofbirth">Date Of Birth </label>
                            <input type="date" name="dateofbirth" max="2020-12-01" min="1900-01-01">
                        </div>

                        <div class="col-6">
                            <label for="role">Role: </label>
                            <br>
                            <select id="role" name="role">
                                <option value="student" selected="selected" >Student</option>
                                <option value="teacher" >Teacher</option>
                            </select>
                        </div>

                        <div class="clear"></div>
                    </div>                       
                    <div class="btn-box">
                    <button type="submit"><?php echo ($buttonTitle)?></button>
                </div>
            </form>
    </body>
</html>
