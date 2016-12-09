<?php

require_once 'PHPMailer/PHPMailerAutoload.php';

$to = "rvtiwari98@gmail.com";
$msg = "Waoooooo !! You got this mail.";
$sub = "Test Mail";

sendEmail($to, $sub, $msg);

function sendEmail($to, $sub, $msg) {
    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "info@gmail.com"; //sender mail id
    $mail->Password = "**************"; // sender mail pwd
    $mail->SetFrom("info@gmail.com","From Name");
    $mail->Subject = $sub;
    $mail->Body = $msg;
    $mail->AddAddress($to);

    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message has been sent";
    }
}
