<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'yourmail@gmail.com'; // your Gmail
        $mail->Password = 'you password';    // app password, NOT Gmail login
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($_POST['email'], $_POST['name']);
        $mail->addAddress('yourmail@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'New message from contact form';
        $mail->Body = "Name: {$_POST['name']}<br>Email: {$_POST['email']}<br><br>Message:<br>{$_POST['message']}";

        $mail->send();
        echo "<script>alert('Message sent successfully!'); window.location.href = '../contact.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Mailer Error: {$mail->ErrorInfo}'); window.location.href = '../contact.html';</script>";
    }
}
?>
