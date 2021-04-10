<?php

namespace App\Helpers;
use Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mails{
    public static function sendMail($email, $subject, $body){
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = \config('newmailer.host');             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = \config('newmailer.username');   //  sender username
            $mail->Password = \config('newmailer.password');       // sender password
            $mail->SMTPSecure = \config('newmailer.encryption');                  // encryption - ssl/tls
            $mail->Port = \config('newmailer.port');                          // port - 587/465
            $mail->setFrom('kapalsar@no-reply.com', 'Kapalasar');
            $mail->addAddress($email);
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->isHTML(true);
            $mail->send();
    }

    public static function sendMailAttached($email, $subject, $body){
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = \config('newmailer.host');             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = \config('newmailer.username');   //  sender username
            $mail->Password = \config('newmailer.password');       // sender password
            $mail->SMTPSecure = \config('newmailer.encryption');                  // encryption - ssl/tls
            $mail->Port = \config('newmailer.port');                          // port - 587/465
            $mail->setFrom('kapalsar@no-reply.com', 'Kapalasar');
            $mail->addAddress($email);
            $mail->Subject = $subject;
            $mail->Body    = $body;
            if(isset($_FILES['attachment'])) {
                for ($i=0; $i < count($_FILES['attachment']['tmp_name']); $i++) {
                    $mail->addAttachment($_FILES['attachment']['tmp_name'][$i], $_FILES['attachment']['name'][$i]);
                }
            }
            $mail->isHTML(true);
            $mail->send();
    }
}