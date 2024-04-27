<?php
require '../../vendor/autoload.php'; // Include PHPMailer autoload file

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

// SMTP configuration
$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com'; // Your SMTP server hostname
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'stanleyamaziro@gmail.com'; // Your SMTP username
$mail->Password = 'uchq dpcd xwpx bznp'; // Your SMTP password
$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587; // TCP port to connect to

// Set sender and recipient
$mail->setFrom('contact@bwec.com.ng', 'BWEC '); 
$mail->addAddress('contact@bwec.com.ng', 'Bwec Name'); 

// Set email content
$mail->isHTML(true); // Set email format to HTML
$mail->Subject = 'Test Email'; // Email subject
$mail->Body = 'This is a test email sent via SMTP using PHPMailer.'; // Email body

// Send the email
try {
    $mail->send();
    echo 'Email has been sent successfully!';
} catch (Exception $e) {
    echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
}
?>