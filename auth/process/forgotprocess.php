<?php
// Start session to store messages
session_start();

// PHPMailer autoload
require '../../vendor/autoload.php';

// Include database connection
include "../../includes/conn.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email entered by the user
    $email = $_POST["email"];

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE Uemail = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generate a random token
        $token = bin2hex(random_bytes(16));

        // Store the token in the database with the user's email
        $updateStmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE Uemail = ?");

        // if (!$updateStmt) {
        //         die("Error: " . $conn->error);
        //     }

        //     $updateStmt->bind_param("ss", $token, $email);
        //     $updateStmt->execute();
        //     $updateStmt->bind_param("ss", $token, $email);
        //     $updateStmt->execute();

        // Send a password reset email with a link containing the token
        $mail = new PHPMailer(true);

        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'stanleyamaziro@gmail.com';
            $mail->Password = 'uchq dpcd xwpx bznp';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Sender and recipient
            $mail->setFrom('stanleyamaziro@gmail.com', ' BWEC');
            $mail->addAddress($email);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset';
            $mail->Body = 'Click the following link to reset your password: <a href="http://localhost/localserver/resetpassword.php?email=' . urlencode($email) . '&token=' . urlencode($token) . '">Reset Password</a>';

            // Send the email
            $mail->send();

            $_SESSION['message'] = "<div style='background-color: white; color: green; padding: 12px'>A password reset link has been sent to your email!</div>";

        } catch (Exception $e) {
            $_SESSION['message'] = "<div style='background-color: white; color: red; padding: 12px'>Failed to send a password reset link. Please try again later!</div>";
        }
    } else {
            $_SESSION['message'] = "<div style='background-color: white; color: red; padding: 12px'>Email not found. Please enter a valid email address!</div>";

    }

    // Redirect back to the forgot password page
    header("Location: ../forgotpassword.php");
    exit();
}
?>