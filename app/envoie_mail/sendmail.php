<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';


$mail = new PHPMailer(true);


try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'houndokinnouhotegnidiegue@gmail.com';                     //SMTP username
    $mail->Password   = 'iwuv kgsx tpgr nhqn ';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('houndokinnouhotegnidiegue@gmail.com', 'BeninTechPro+');
    $mail->addAddress('dondiegue21@gmail.com', 'Don Diègue');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('IMG_20241215_164858_244~2.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Confirmation de mail';
    $mail->Body    = 'Bonjour Don Diègue <b>http://robostim.pythonanywhere.com!</b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Envoie réussi...';
} 
catch (Exception $e) {
    echo "Message non envoyé: {$mail->ErrorInfo}";
}



?>

