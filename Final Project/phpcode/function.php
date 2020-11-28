<?php 

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function takeRole ($username){
        require "connection.php";
        $sql = "SELECT A.role FROM Account A WHERE A.username = ?";
        $stm = $conn->prepare ($sql);
        $stm-> bind_param('s', $username);
        $stm->execute();
        $result = $stm ->get_result();
        if ($row = $result -> fetch_assoc()){
            $stm -> close();
            $conn ->close();
            return $row["role"];
        }
        else {
            $stm -> close();
            $conn ->close();
            return null;
        }
    }

    function checkAdmin ($username){
        $role = takeRole($username);
        if ($role == "admin"){
            return TRUE;
        }
        else return FALSE;
    }

    function canTeach ($username){
        $role = takeRole($username);
        if (($role == "admin") or ($role == "teacher")){
            return TRUE;
        }
        else return FALSE;
    }

    function getId ($username){
        require "connection.php";
        $sql = "SELECT A.id FROM Account A WHERE A.username = ?";
        $stm = $conn->prepare ($sql);
        $stm-> bind_param('s', $username);
        $stm->execute();
        $result = $stm ->get_result();
        if ($row = $result -> fetch_assoc()){
            $stm -> close();
            $conn ->close();
            return $row["id"];
        }
        else {
            $stm -> close();
            $conn ->close();
            return null;
        }
    }

    function getCurrentDateTime(){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        return date('Y-m-d H:i:s');
    }

    function sendResetPasswordEmail ($email, $token){
        // Import PHPMailer classes into the global namespace
        // These must be at the top of your script, not inside a function

        // Load Composer's autoloader
        require 'vendor/autoload.php';

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'acthien123@gmail.com';                     // SMTP username
            $mail->Password   = 'klcyndaamyjuheof';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('acthien123@gmail.com', 'Admin Classroom');
            $mail->addAddress($email, 'User');     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'ResetPassword';
            $mail->Body    = "Click <a href='http://localhost:80/finalproject/Final Project/phpcode/test.php?email=$email'>Vào đây</a> để xác minh tài khoản";
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
            return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }

    function randomString($n){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $n; $i++) {
            $randstring .= $characters[rand(0, strlen($characters)-1)];
        }
        return $randstring;
    }
?> 