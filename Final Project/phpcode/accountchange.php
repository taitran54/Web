<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
        <?php
            if (isset ($_GET["id"])){
                echo ("Edit Account");
            } else {
                echo ("Add Account");
            }
        ?>
        </title>
    
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="main.js"></script>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="shorcut icon" href="uploads/earth.jpg" type="image/jpg">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    $phone = "";
    $title = "Add Account";
    $buttonTitle = "Add";
    session_start();
    if (isset($_GET['id'])){
        require "connection.php";
        $id=$_GET['id'];
        $sql = "SELECT A.username, A.password, A.role, P.name, P.email, P.address, P.birth, P.phone 
            FROM Account A, Profile P WHERE A.id_profile = P.id AND A.id=".$id;
        $result =$conn->query ($sql);
        $row = $result ->fetch_assoc();  
        
        if ($row){
            $username = $row['username'];
            $password = $row["password"];
            $role = $row["role"];
            $name = $row["name"];
            $address = $row["address"];
            $email = $row["email"];
            $brith = $row["birth"];
            $phone = $row["phone"];
        }

        $title = "Edit Account";
        $buttonTitle = "Update";
    }
    ?>
	<?php
		include 'sidebar.php';
	?>
            <form name="myRegisterForm" action = "processaccount.php?from=admin" method="post" enctype="multipart/form-data" onsubmit="return validateRegisterForm()">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="register-form">
                    <div class="input-box">
                        Full Name: <input type="text" name="fullname" placeholder="Enter Full Name" value= "<?php echo ($name)?>" required>
                    </div>

                    <div class="input-box">
                        Email <input type="text" name="email" placeholder="Enter Email" value= "<?php echo ($email)?>" required>
                    </div>

                    <div class="input-box">    
                        Username: <input type="text" name="username" placeholder="Enter UserName" value ="<?php echo ($username)?>" required><br>
                    </div>

                    <div class="input-box">    
                        Password: <input type="text" name="password" placeholder="Enter Password" value = "<?php echo ($password)?>" required><br> 
                    </div>

                    <div class="input-box">
                        Re-type Password: <input type="text" name="password2"  placeholder="Re-type Password" value = "" required>
                    </div>

                    <div class="input-box">
                        Address: <input type="text" name="address" placeholder="Enter Address" value = "<?php echo ($address)?>" required>
                    </div>

                    <div class="input-box">
                        Enter a phone number: <input type="tel" id="phone" name="phone"
                          placeholder="0123456789"
                          pattern="[0]{1}[0-9]{9}" 
                          value = "<?php echo ($phone)?>" required>
                    </div>

                    <label for="fileToUpload">Image</label>
                    <div class="input-group">
                        <input type="file" id="fileToUpload" name="fileToUpload" required>
                    </div>

                    <div class="input-box">
                        <div class="col-6"  onsubmit="return checkForm()"  >
                            <label for="dateofbirth">Date Of Birth </label>
                            <input type="date" name="dateofbirth" max="2020-12-01" min="1900-01-01" value = "<?php echo ($brith)?>" style="width:170px;">
                        </div>

                        <div class="col-6">
                            <label for="role">Role: </label>
                            <br>
                            <select id="role" name="role">
                                <option value="admin" <?php echo $role =="admin"? "selected":"" ?>>Admin</option>
                                <option value="student" <?php echo $role =="student"? "selected":"" ?>>Student</option>
                                <option value="teacher"<?php echo $role =="teacher"? "selected":"" ?> >Teacher</option>
                            </select>
                        </div>

                        <div class="clear"></div>
                    </div>                       
                    <div class="btn-box">
                    <button type="submit"><?php echo ($buttonTitle)?></button>
                </div>
                <?php
                    if (isset($_GET["error"])){
                    echo '<script language="javascript">';
                    if ($_GET["error"]=="user"){
                        echo 'alert("Your user is invalid.")';
                    }
                    if ($_GET["error"]=="email"){
                        echo 'alert("Your email is invalid.")';
                    }
                    if ($_GET["error"]=="image"){
                        echo 'alert("There was an error when upload your image")';
                    }
                    echo '</script>';
                    }
                ?>
            </form>
    </body>
</html>
