<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sendRequestJoinClass ($email, $idclass){
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
        $mail->Subject = 'Requst join class';
        $mail->Body    = "Click <a href='http://localhost:80/finalproject/Final Project/phpcode/acceptrequest.php?email=$email&id=$idclass'>Vào đây</a> để tham gia lớp.
                            <br></br>
                        Click <a href='http://localhost:80/finalproject/Final Project/phpcode/cancelrequest.php?email=$email&id=$idclass'>Vào đây</a> để từ chối. ";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}

try {
    require "connection.php";
    $email = $_GET['emailkey'];
    $idclass = $_GET['id'];
    $sql = "SELECT A.id FROM Profile P, Account A
            WHERE   A.id_profile = P.id
                AND P.email='$email'";
    $result = $conn->query($sql);
    $num = $result ->num_rows;
    if ($num == 1){
        $row = $result ->fetch_assoc();
        $id = $row['id'];
        $sql = "INSERT INTO Joining (id_account, id_class, approval)
                VALUES ($id, $idclass, 2)";
        echo($sql);
        if (sendRequestJoinClass($email, $idclass)){
            $conn ->query($sql);
             
            header("Location: checkjoin.php?id=$idclass&aleart=success&emailkey=$email");
            exit;
        }else {
            // header("Location: checkjoin.php?id=$idclass&aleart=fail&emailkey=$email");
            // exit;
        }
    } else{
        header("Location: checkjoin.php?id=$idclass&aleart=fail&emailkey=$email");
            exit;
    }

} catch (Exception $e){
    header("Location: checkjoin.php?id=$idclass&aleart=fail&emailkey=$email");
    exit;
}

?>