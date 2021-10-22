<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require_once __DIR__.'\..\..\vendor\autoload.php';

class mail
{

    private $emailTo;
    private $subject;
    private $body;
    function __construct($emailTo,$subject,$body)
    {
        $this->emailTo=$emailTo;
        $this->subject=$subject;
        $this->body=$body;
    }
    public function sendMail()
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //webdevphpgroupenggalal@gmail.com
            //159357852654
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'webdevphpgroupenggalal@gmail.com';                     //SMTP username
            $mail->Password   = '159357852654';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('webdevphpgroupenggalal@gmail.com', 'Ecommerce');
            $mail->addAddress($this->emailTo);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $this->subject;
            $mail->Body    = $this->body;

            $mail->send();
            return True;
        } catch (Exception $e) {
            return False;
        }
    }
}
