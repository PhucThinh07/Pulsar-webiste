<?php

namespace App\Core\Helpers;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class MailerHelper{

    private $_mail;

    public function __construct()
    {
        $this->_mail = new PHPMailer(true);

        $this->_mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $this->_mail->isSMTP();                                            //Send using SMTP
        $this->_mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $this->_mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->_mail->Username   = 'phucthinh2632003@gmail.com';                     //SMTP username
        $this->_mail->Password   = 'ecmbkbzidyizyffk';                               //SMTP password
        $this->_mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $this->_mail->Port       = 465;        
        $this->_mail->CharSet    = 'UTF-8';     
    }

    public function recipients($from,$to)
    {
        foreach ($from as $mail => $name){
            $this->_mail->setFrom($mail, $name);
        }
        foreach ($to as $mail => $name){
            $this->_mail->addAddress($mail, $name);
        }
    }

    public function content()
    {
        $this->_mail->isHTML(true);
        $this->_mail->Subject = 'Quên mật khẩu tài khoản Pulsar';
        $this->_mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $this->_mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    }

    public function send()
    {
        $this->_mail->send();
    }

}