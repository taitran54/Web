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
        <style type="text/css">
                        *{
                padding: 0px;
                margin: 0px;
                font-family: sans-serif;
                box-sizing: border-box;
            }
            .container{
                width: 100%;
                max-width: 1200px;
                margin-left: auto;
                margin-right: auto;
            }
            .col-6{
                float: left;
                width: 50%;
            }
            .clear{
                clear: both;
            }
            h1{
                color: #009999;
                font-size: 20px;
                margin-bottom: 30px;
            }

            .register-form{
                width: 100%;
                max-width: 400px;
                margin: 20px auto;
                background-color: #ffffff;
                padding: 15px;
                border: 2px dotted #cccccc;
                border-radius: 10px;
            }

            .input-box{
                margin-bottom: 10px;
            }
            .input-box input[type='text'],
            .input-box input[type='password'],
            .input-box input[type='date']{
                padding: 7.5px 15px;
                width: 100%;
                border: 1px solid #cccccc;
                outline: none;
                font-size: 16px;
                display: inline-block;
                height: 40px;
                color: #666666;
            }
            .input-box select{
                padding: 7.5px 15px;
                width: 100%;
                border: 1px solid #cccccc;
                outline: none;
                font-size: 16px;
                display: inline-block;
                height: 40px;
                color: #666666;
            }
            .input-box option{
                font-size: 16px;
            }
            .input-box input[type='checkbox']{
                height: 1.5em;
                width: 1.5em;
                vertical-align: middle;
                line-height: 2em;
            }
            .input-box textarea{
                padding: 7.5px 15px;
                width: 100%;
                border: 1px solid #cccccc;
                outline: none;
                font-size: 16px;
                min-height: 120px;
                color: #666666;
            }
            .btn-box{
                text-align: right;
                margin-top: 30px;
            }
            .btn-box button{
                padding: 7.5px 15px;
                border-radius: 2px;
                background-color: #009999;
                color: #ffffff;
                border: none;
                outline: none;
            }   
        </style>
        <script type="text/javascript">
            
            function validateRegisterForm() {
                var user = document.myRegisterForm.username.value;
                var pass = document.myRegisterForm.password.value;
                var addre = document.myRegisterForm.address.value;
                var pass2 = document.myRegisterForm.password2.value;
                var fname = document.myRegisterForm.fullname.value;
                var phonee = document.myRegisterForm.phone.value;
                var images = document.myRegisterForm.image.value;
                var date = document.myRegisterForm.dateofbirth.value;
                var rol = document.myRegisterForm.role.value;
                
                
                if ( phonee == "" || images == "" || date == "" || rol == "" || user == "" || fname =="" || addre == "") {
                    alert("Please Fill All Information");
                    return false;
                }
                if (pass.length < 6  ) {
                    alert("Password must be at least 6 characters long.");
                    return false;
                }
                if (pass2.length < 6 ) {
                    alert("Password must be at least 6 characters long.");
                    return false;
                }
                if (pass==pass2) {
                    return true;
                }
                else if (pass!=pass2) {
                    alert("password must be same!")
                    return false;
                }
            }   

        </script>
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
    $title = "Registor";
    $buttonTitle = "Sign up";
    
    if (isset($_SESSION["username"])){
        require "connection.php";
        $username = $_SESSION["username"];
        $sql = "SELECT A.id, A.password, A.role, P.name, P.email, P.address, P.birth, P.phone 
            FROM Account A, Profile P WHERE A.id_profile = P.id AND A.username=".$username;
        $result =$conn->query ($sql);
        $row = $result ->fetch_assoc();  
        
        if ($row){
            $id = $row['id'];
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
            <form name="myRegisterForm" action = "processaccount.php" method="post" enctype="multipart/form-data" onsubmit="return validateRegisterForm()">
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
                        Password: <input type="password" name="password" placeholder="Enter Password" value = "<?php echo ($password)?>" required><br> 
                    </div>

                    <div class="input-box">
                        Re-type Password: <input type="password" name="password2"  placeholder="Re-type Password" value = "" required>
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
                            <input type="date" name="dateofbirth" max="2020-12-01" min="1900-01-01" value = "<?php echo ($brith)?>">
                        </div>

                        <div class="col-6">
                            <label for="role">Role: </label>
                            <br>
                            <select id="role" name="role">
                                <option value="student" <?php echo $role =="teacher"? "":"selected" ?>>Student</option>
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
