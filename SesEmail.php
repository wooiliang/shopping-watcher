<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class SesEmail
{
    public static function sendEmail($body) {
        $configs = require('Config.php');
        $mail = new PHPMailer(true);

        try {
            // Specify the SMTP settings.
            $mail->isSMTP();
            $mail->setFrom($configs['mail']['sender'], $configs['mail']['sendername']);
            $mail->Username   = $configs['mail']['username_smtp'];
            $mail->Password   = $configs['mail']['password_smtp'];
            $mail->Host       = $configs['mail']['host'];
            $mail->Port       = $configs['mail']['port'];
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = 'tls';

            // Specify the message recipients.
            $mail->addAddress($configs['mail']['recipient']);
            // You can also add CC, BCC, and additional To recipients here.

            // Specify the content of the message.
            $mail->isHTML(true);
            $mail->Subject    = $configs['mail']['subject'];
            $mail->Body       = $body;
            $mail->AltBody    = $body;
            $mail->Send();
            echo "Email sent!" , PHP_EOL;
        } catch (phpmailerException $e) {
            echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
        } catch (Exception $e) {
            echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
        }
    }
}
