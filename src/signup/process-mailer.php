<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require './PHPMailer/Exception.php';
    require './PHPMailer/PHPMailer.php';
    require './PHPMailer/SMTP.php';

    //Create an instance; passing `true` enables exceptions

    $username = 'nnvu.edu@gmail.com';
    $password = 'jvwjgpnzfjftzobv';

    function sendMail($email, $link){
        global $username;
        global $password;
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $username;                     //SMTP username
            $mail->Password   = $password;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet    = 'utf-8';


            //Recipients
            $mail->setFrom($username, 'Facebook');
            //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
            $mail->addAddress($email);               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Ch??o m???ng b???n ?????n v???i trang fb c???a ch??ng t??i!';
            $mail->Body    = "Ch??o m???ng {$email}!<br>????? x??c minh t??i kho???n, h??y truy c???p ???????ng link sau ????y: <br><a href='$link'>X??c minh t??i kho???n</a>";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            header("location: ../../components/welcomeNewUser.php");
        } catch (Exception $e) {
            $error = "Email c?? v??? kh??ng t???n t???i r???i b???n ??iiii";
            header("location: ../../components/404page.php?error=$error");
        }
    }
?>
