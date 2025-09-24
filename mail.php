<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'angela.irungu@strathmore.edu';                     //SMTP username
    $mail->Password   = 'cudm jjyk vcaa ydnv';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('angela.irungu@strathmore.edu', 'Irungu Angela');
    $mail->addAddress('angelairungu71006@gmail.com', 'AJR');     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
   $mail->Subject = 'ICS 2.2 Account Verification';
    $mail->Body    = '
        <div style="font-family: Arial, sans-serif; font-size:14px; color:#333;">
            <p>Hi <b>Username</b>,</p>
            <p>You requested an account in <b>ICS 2.2</b>.</p>
            <p>In order to use this account you need to 
            <a href="http://your-verification-link.com">verify your email</a>.
            </p>
            <br>
                <p>Regards,<br>
                System Admin<br>
                ICS 2.2</p>
        </div>
    ';
    
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}