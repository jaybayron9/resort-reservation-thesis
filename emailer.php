<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'jaybayron400@gmail.com';
    $mail->Password = 'fyhzihqtjhxrworh';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    
    $mail->setFrom('dclinic139@gmail.com');
    $mail->addAddress('jaybayron400@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = 'Admin Password Request in V.M.S.';
    $mail->Body = 'Hello Admin! Here is your password in Visitor management!<br> Password : ';
    
    $result = $mail->send();
    echo json_encode([$result], JSON_PRETTY_PRINT);
} catch (\Exception $e) {
    echo json_encode(['error' => $e->getMessage()], JSON_PRETTY_PRINT);
}