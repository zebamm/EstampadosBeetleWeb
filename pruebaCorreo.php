<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sublimadosbeetle@gmail.com';
    $mail->Password = 'pbzu uivs fuut ihky';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('sublimadosbeetle@gmail.com', 'Tienda Beetle');
    $mail->addAddress('sebamatiasmonzon@gmail.com');

    $mail->Subject = 'Prueba PHPMailer';
    $mail->Body = 'Este es un mensaje enviado con PHPMailer desde XAMPP.';

    $mail->send();
    echo 'Correo enviado correctamente!';
} catch (Exception $e) {
    echo "Error al enviar correo: {$mail->ErrorInfo}";
}
