<?php 


// create message
//send message
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

    $params = $_POST;

    $name = $params['name'];
    $email = $params['email'];
    $phone = $params['phone'];
    $message = $params['message'];

    $mail->setFrom($email, $name);

    $mail->addAddress('cathy@ledmedical.ca', 'Amherstburg Health Care Centre');
    $mail->addReplyTo('cathy@ledmedical.ca', 'Amherstburg Health Care Centre');
    $mail->ReutrnPath='cathy@ledmedical.ca';

    $mail->isHTML(true);

    $body = "Name: " . $name . "<br/>" .
            "Email: " . $email . "<br/>" .
            "Phone: " . $phone . "<br/>" .
            "Message: " . $message;

    $mail->Subject = "New Message from Amherstburg Health Care Centre";
    $mail->Body    = $body;
    $mail->AltBody = $body;

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo "Success!";
    }