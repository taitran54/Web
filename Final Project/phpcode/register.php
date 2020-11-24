<!DOCTYPE html>
<html>
    <head>
        <title>Register for a new account</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/register.css">
        <script src="js/validformregis.js"></script>
    </head>
    <body>
            <form name="myform" method="post" onsubmit="return validateForm()">
                <div class="register-form">
                    <div class="input-box">
                        Full Name: <input type="text" name="fullname" placeholder="Enter Full Name">
                    </div>

                    <div class="input-box">    
                        Username: <input type="text" name="username" placeholder="Enter UserName"><br>
                    </div>

                    <div class="input-box">    
                        Password: <input type="password" name="password" placeholder="Enter Password" ><br> 
                    </div>

                    <div class="input-box">
                        Re-type Password: <input type="password" name="password2"  placeholder="Re-type Password">
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
                    <button type="submit">Register</button>
                </div>
            </form>
    </body>
</html>